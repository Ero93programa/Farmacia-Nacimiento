<?php
/**
 * Farmacia de guardia – COF Almería
 * Municipio: NACIMIENTO
 * HTML fresco
 */

// =========================
// CONFIGURACIÓN
// =========================
$municipio = 'NACIMIENTO';
$cacheDir  = __DIR__;
$datosCache = $cacheDir . '/guardia_datos.json'; 
$cacheTTL  = 86400; // 24h

$url        = 'https://www.cofalmeria.com/farmacias-guardia';
$cacertPath = $cacheDir . '/cacert.pem';

$forzarActualizacion = isset($_GET['refresh']) && $_GET['refresh'] == '1';

// =========================
// 1️⃣ COMPROBAR CACERT
// =========================
if (!file_exists($cacertPath)) {
    echo '<div class="alert alert-danger">Error: Falta cacert.pem</div>';
    return;
}

// =========================
// 2️⃣ FUNCIÓN PARA OBTENER DATOS
// =========================
function obtenerDatosFarmacia($url, $municipio, $cacertPath) {
    $cookieFile = tempnam(sys_get_temp_dir(), 'cof_cookie_');
    
    // GET inicial
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_COOKIEJAR      => $cookieFile,
        CURLOPT_COOKIEFILE     => $cookieFile,
        CURLOPT_USERAGENT      => 'Mozilla/5.0',
        CURLOPT_CAINFO         => $cacertPath,
        CURLOPT_TIMEOUT        => 30,
    ]);
    
    $htmlGet = curl_exec($ch);
    curl_close($ch);
    
    if (!$htmlGet) {
        return ['error' => 'Error al cargar la página inicial'];
    }
    
    // Parsear formulario
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    @$dom->loadHTML($htmlGet);
    libxml_clear_errors();
    $xpath = new DOMXPath($dom);
    
    $postFields = [];
    foreach ($xpath->query("//form//input[@name]") as $input) {
        $postFields[$input->getAttribute('name')] = $input->getAttribute('value');
    }
    
    $postFields['ctl00$ch$selMunicipio$txtSeleccionador'] = $municipio;
    $postFields['__EVENTTARGET']   = 'ctl00$btnBuscar';
    $postFields['__EVENTARGUMENT'] = '';
    
    // POST búsqueda
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => $url,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query($postFields),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_COOKIEJAR      => $cookieFile,
        CURLOPT_COOKIEFILE     => $cookieFile,
        CURLOPT_USERAGENT      => 'Mozilla/5.0',
        CURLOPT_CAINFO         => $cacertPath,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/x-www-form-urlencoded',
            'Referer: ' . $url,
        ]
    ]);
    
    $htmlPost = curl_exec($ch);
    curl_close($ch);
    unlink($cookieFile);
    
    if (!$htmlPost) {
        return ['error' => 'Error al realizar la búsqueda'];
    }
    
    // Extraer datos
    $dom = new DOMDocument();
    @$dom->loadHTML($htmlPost);
    libxml_clear_errors();
    $xpath = new DOMXPath($dom);
    
    $primeraFila = $xpath->query("//div[@class='FilaEntidades']")->item(0);
    
    if (!$primeraFila) {
        return ['error' => 'No hay farmacia de guardia'];
    }
    
    $farmacia = [];
    
    // Nombre y fecha
    $nombreNode = $xpath->query(".//h3/a", $primeraFila)->item(0);
    if ($nombreNode) {
        $textoCompleto = trim($nombreNode->textContent);
        if (preg_match('/^(.+?)\s+(\d{2}\/\d{2}\/\d{4}\s+\(.+?\))$/', $textoCompleto, $matches)) {
            $farmacia['nombre'] = trim($matches[1]);
            $farmacia['fecha'] = trim($matches[2]);
        } else {
            $farmacia['nombre'] = $textoCompleto;
            $farmacia['fecha'] = '';
        }
    }
    
    // Dirección
    $direccionNode = $xpath->query(".//dd[@id[contains(., 'ddDireccion')]]", $primeraFila)->item(0);
    if ($direccionNode) {
        $farmacia['direccion'] = trim($direccionNode->textContent);
    }
    
    // Teléfono
    $telefonoNode = $xpath->query(".//dd[@id[contains(., 'ddTelefono')]]", $primeraFila)->item(0);
    if ($telefonoNode) {
        $farmacia['telefono'] = trim($telefonoNode->textContent);
    }
    
    return $farmacia;
}

// =========================
// 3️⃣ OBTENER DATOS (cache o nuevos)
// =========================
$farmacia = null;

if (!$forzarActualizacion && file_exists($datosCache) && (time() - filemtime($datosCache)) < $cacheTTL) {
    // Leer del cache
    $json = file_get_contents($datosCache);
    $farmacia = json_decode($json, true);
} else {
    // Obtener datos nuevos
    $farmacia = obtenerDatosFarmacia($url, $municipio, $cacertPath);
 
    
    // Guardar en cache
    if (!isset($farmacia['error'])) {
        file_put_contents($datosCache, json_encode($farmacia, JSON_PRETTY_PRINT));
    }
}

// =========================
// 4️⃣ GENERAR HTML (siempre fresco)
// =========================
if (isset($farmacia['error'])) {
    echo '<div class="alert alert-warning">' . htmlspecialchars($farmacia['error']) . '</div>';
} elseif (empty($farmacia['nombre'])) {
    echo '<div class="alert alert-warning">No se pudieron extraer los datos de la farmacia.</div>';
} else {
    ?>
<div class="farmacia-guardia-unica">
  <h3 class="titulo-guardia">🏥 Farmacia de Guardia</h3>
  <div class="farmacia-card">
    <div class="farmacia-nombre"><?php echo htmlspecialchars($farmacia['nombre']); ?></div>
    <?php if (!empty($farmacia['fecha'])): ?>
    <div class="farmacia-fecha">
      <i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars($farmacia['fecha']); ?>
    </div>
    <?php endif; ?>
    <?php if (!empty($farmacia['direccion'])): ?>
    <div class="farmacia-direccion">
      <i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($farmacia['direccion']); ?>
    </div>
    <?php endif; ?>
    <?php if (!empty($farmacia['telefono'])): ?>
    <div class="farmacia-telefono">
      <i class="fas fa-phone"></i> 
      <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $farmacia['telefono']); ?>">
        <?php echo htmlspecialchars($farmacia['telefono']); ?>
      </a>
      <p>Datos proporcionados por el <a href="https://www.cofalmeria.com/inicio">Colegio Oficial de Farmacéuticos de Almería</a></p>
    </div>
    <?php endif; ?>
  </div>
</div>
    <?php
}