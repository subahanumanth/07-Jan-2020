<!DOCTYPE html>
<html>
   <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script>
         function functionAlert(msg, myYes) {
            var confirmBox = $("#confirm");
            confirmBox.find(".message").text(msg);
            confirmBox.find(".yes").click(function() {
               confirmBox.hide();
            });
            confirmBox.show();
         }
      </script>
     </script>
          <style>
         #confirm {
            border-radius:50px;
            display: none;
            background-color: #F3F5F6;
            color: #000000;
            border: 1px solid #aaa;
            position: fixed;
            width: 300px;
            height: 100px;
            left: 40%;
            top: 30%;
            box-sizing: border-box;
            text-align: center;
         }
         #confirm button {
            background-color: #FFFFFF;
            display: inline-block;
            border-radius: 12px;
            border: 4px solid #aaa;
            padding: 5px;
            text-align: center;
            width: 60px;
            cursor: pointer;
            color:red;
         }
         #confirm .message {
            text-align: left;
	    color:green;
	    padding-left: 65px;
            padding-top:10px;
         }
      </style>

   </head>
   <body>
      <div id="confirm">
         <div class="message">Deleted.</div><br>
         <button class="yes">OK</button>
      </div>
      <input type="button" value="Click Me" onclick="functionAlert();" />
   </body>
</html>
