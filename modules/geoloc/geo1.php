<!DOCTYPE html>

<html>
    <head>
        <title>JavaScript Get & Set Input Text Value</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <input type="text" id="txt" name="txt" value = ''/>
        <button onclick="getAndSetVal();">Get Value</button>
        <input type="text" id="txt2" name="txt" onclick="this.value = '' "/>
        <!-- clear input on mouse click-->
        
        <script>
            
            // set value using id
            //document.getElementById('txt').value = "Text Here";
            
            // set value using input
            //document.getElementsByTagName('input')[1].value = "Input Value";
            
            function getAndSetVal()
            {
                var txt1 = document.getElementById('txt').value;
                document.getElementById('txt2').value = txt1;
            }
            
            // get value
            function getVal()
            {
             var txt = document.getElementById('txt').value;
             alert(txt);
            }
            
        </script>
        
    </body>
</html>