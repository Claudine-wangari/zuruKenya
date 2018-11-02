<html>
<head>
    <title>Untitled Page</title>

    <script language="javascript" type="text/javascript">
        function printDiv(divID) 
        {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = divElements;

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
        }
    </script>

</head>
<body>
    <form id="form1">
        
    <div id="printablediv" style="width: 100%; background-color: Blue; height: 100px">
        Print me I am in 1st Div
    </div>
    <div id="donotprintdiv" style="width: 100%; background-color: Gray; height: 100px">
        I am not going to print
    </div>
    <input type="button" value="Print 1st Div" onclick="javascript:printDiv('printablediv')" />
    </form>
</body>
</html>