<!-- <input type="file" id="tombol" onchange="fungsi()"><br> -->
<input type="file" id="tombol"><br>

  <h3>Compressed Image</h3>
  <img id="result" class='img-container custom_file_image' />




  <script src="ASSETS/bootstrap/js/jquery-3.3.1.min.js" ></script>

<script>


const outputFormat = 'jpg';
// const previewCompress = document.getElementById('result-compress-image');


$('#tombol').on('change', function(fungsi) {



  let reader = new FileReader();
        function c(){compressFile($(this).files[0]);}
        reader.readAsDataURL(c.target.result);
        reader.onload = () => {
            $(this).siblings('.custom_file_image').attr('src', reader.result);
        }


})



function compressFile(loadedData) {

    const mimeType = typeof outputFormat !== 'undefined' && outputFormat === 'png' ? 'image/png' : 'image/jpeg'

    const canvas = document.createElement('canvas')
    canvas.width = loadedData.width;
    canvas.height = loadedData.height;
    
    
    const ctx = canvas.getContext('2d').drawImage(loadedData, 0, 0)
    const newImageData = canvas.toDataURL(mimeType, quality / 100)
    const img = new Image()
    img.src = newImageData

    return img.src
 
}
</script>

