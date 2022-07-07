<input type="file" onchange="previewFile()"><br>
<div>
  <h3>Original Image</h3>
  <img id="source-image" />
</div>
<div>
  <h3>Resized Image</h3>
  <div id="result-resize-image">
  </div>
</div>
<div>
  <h3>Compressed Image</h3>
  <img id="result-compress-image" class='img-container' />
</div>
<br><br>
<div>
  <fieldset>
    <legend>Compressor settings</legend>
    <div id='controls-wrapper'>
      Compression ratio : <input id="jpeg-encode-quality" size='3' readonly='true' type="text" value="30" /> %
    </div>
  </fieldset>
</div>
<div>
  <fieldset>
    <legend>Console output</legend>
    <div id='console-out'></div>
  </fieldset>
</div>



<script>
// Console logging (html)
if (!window.console) console = {}
const consoleOut = document.getElementById('console-out')
console.log = message => {
    consoleOut.innerHTML += message + '<br />'
    consoleOut.scrollTop = consoleOut.scrollHeight
}

const outputFormat = 'jpg'

const encodeButton = document.getElementById('jpeg-encode-button')
const encodeQuality = document.getElementById('jpeg-encode-quality')

function previewFile() {
    const preview = document.getElementById('source-image')
    const previewResize = document.getElementById('result-resize-image')
    const previewCompress = document.getElementById('result-compress-image')

    const file = document.querySelector('input[type=file]').files[0]
    const reader = new FileReader()
    reader.onload = e => {
        preview.onload = () => {
            resizeFile(preview, previewResize)
            compressFile(preview, previewCompress)
        }
        preview.src = e.target.result
        // preview.src = reader.result
    }

    if (file) {
        reader.readAsDataURL(file)
    }
}

function resizeFile(loadedData, preview) {
    console.log('Image resizing:')
    console.log(`Resolution: ${loadedData.width}x${loadedData.height}`)
    const canvas = document.createElement('canvas')
    canvas.width = Math.round(loadedData.width / 2)
    canvas.height = Math.round(loadedData.height / 2)

    preview.appendChild(canvas)
    // document.body.appendChild(canvas)

    const ctx = canvas.getContext('2d')
    ctx.drawImage(loadedData, 0, 0, canvas.width, canvas.height)
    console.log(`New resolution: ${canvas.width}x${canvas.height}`)
    console.log('---')
}

function compressFile(loadedData, preview) {
    console.log('Image compressing:')
    console.log(`width: ${loadedData.width} | height: ${loadedData.height}`)

    const quality = parseInt(encodeQuality.value)
    console.log(`Quality >> ${quality}`)

    const timeStart = performance.now()
    console.log('process started...')

    const mimeType = typeof outputFormat !== 'undefined' && outputFormat === 'png' ? 'image/png' : 'image/jpeg'

    const canvas = document.createElement('canvas')
    canvas.width = loadedData.width;
    canvas.height = loadedData.height;
    
    const ctx = canvas.getContext('2d').drawImage(loadedData, 0, 0)
    const newImageData = canvas.toDataURL(mimeType, quality / 100)
    const img = new Image()
    img.src = newImageData

    preview.src = img.src
    preview.onload = () => {}

    const duration = performance.now() - timeStart;
    console.log('process finished...')
    console.log(`Processed in: ${duration}ms`)
    console.log('---')
}

</script>

