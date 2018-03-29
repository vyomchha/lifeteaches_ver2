<?php
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function finish($conn) {
}

$ID = 0;
$cdate = date("Y-m-d");
$header = "Header Title";
$teaser = "some text to explain the heading";
$sql = "";
	
//$orgs = $area = $serv = NULL;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$ID = test_input($_POST["ID"]);
	$content_ht = "../blog/post/".$ID.".php";
	$content_js = "../blog/data/".$ID.".json";
	
	if(!empty($_POST["header"])) {
		$header = test_input($_POST["header"]);
	}
	if(!empty($_POST["teaser"])) {
		$teaser = test_input($_POST["teaser"]);
	}
	
	//FILE_HT CHECK, HTML FORMAT BLOG POST
	if(!empty($_POST["file_ht"])) {
		$file_ht = test_input($_POST["file_ht"]);
		//echo "FILE POSTED:<br>$file_ht<hr>";
	}	
	else {
		if ($_POST["action"] == "insert"){
			$handle_file_ht = fopen($content_ht, "w") or die('Cannot open file:  '.$content_ht);
		}
		else {
			$handle_file_ht = fopen($content_ht, "r") or die('Cannot open file:  '.$content_ht);
			$file_ht = fread($handle_file_ht,filesize($content_ht));
			//echo "FILE NOT POSTED:<br>$file_ht<hr>";
		}
	}
	
	//FILE_JS CHECK, JSON FORMAT BLOG POST
	if(!empty($_POST["file_js"])) {
		$file_js = test_input($_POST["file_js"]);
		//echo "FILE POSTED:<br>$file_js<hr>";
	}
	else {
		if ($_POST["action"] == "insert"){
			$handle_file_js = fopen($content_js, "w") or die('Cannot open file:  '.$content_js);
		}
		else {
			$handle_file_js = fopen($content_js, "r") or die('Cannot open file:  '.$content_js);
			$file_js = fread($handle_file_js,filesize($content_js));
			//echo "FILE NOT POSTED:<br>$file_js<hr>";
		}
	}
}

require ("../etc/config.php");

// Create connection
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error . "---" . $config['servername']. $config['username']. $config['password']. $config['dbname']);
}

if ($_POST["action"] == "delete"){$sql="DELETE FROM News WHERE  ID='$ID'";} 
if ($_POST["action"] == "insert"){$sql="INSERT INTO News SET ID='$ID', header='$header', content_ht='$content_ht', content_js='$content_js', cdate='$cdate', teaser='$teaser'";} 
if ($_POST["action"] == "update"){
	$sql="UPDATE News SET header='$header', content_ht='$content_ht', content_js='$content_js', cdate='$cdate', teaser='$teaser' WHERE  ID='$ID'";
	$handle_file_ht = fopen($content_ht, "w") or die('Cannot open file:  '.$content_ht);
	$handle_file_js = fopen($content_js, "w") or die('Cannot open file:  '.$content_js);
	fwrite($handle_file_ht, $file_ht);
	fwrite($handle_file_js, $file_js);
}

$result = mysqli_query($conn,$sql);
mysqli_close($conn);

if ($_POST["action"] == "delete") {
	header("Location: http://www.lifeteaches.org/admin/lt_admin_news.php");
	die();
	}
	
//echo "$ID<br>$header<br>$cdate<br>$content_ht<br>$content_js<br>$teaser<br>RESULT=$result<hr>";
?>

<html>

	<head>
		<title> Life Teaches Foundation </title>

        <meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html;">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
		
		<link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">
		<script src="https://cdn.quilljs.com/1.3.4/quill.js"></script>
		
		<!--Link StyleSheets-->
        <link rel="stylesheet" type="text/css" href="../css/lt_css_admin.css">
		<style>
		#m-container {
			width: 45vw;
			margin: auto;
			position: relative;
			display: inline-block;
			float:left;
			margin: 0 1.5vw;
		}
		#pre {
			width: 41vw;
			margin: auto;
			position: relative;
			display: inline-block;
			float:left;
			border: solid black;
			padding: 2vw;
			margin: 0 1.5vw;
			height: 50vh;
		}
		#editor-container {
			height: 50vh;
		}
		</style>
	</head>
	<body>
	<h1 style="text-align:center;">Please Create an Article:</h1><hr>
	<?php
	
		echo "<br><br><table><tr>";
		echo "<form action='lt_admin_news_update.php' method='post' enctype='multipart/form-data'>";
		echo "<td><a href='http://www.lifeteaches.org/admin/lt_admin_news.php'>Back to Selection</a></td>";
		echo "<td><input type='hidden' name='cdate' value='$cdate' readonly>$cdate</td>";
		echo "<td><input type='hidden' name='ID' value='$ID' readonly>HEADING:</td>";
		echo "<td class='td_long'><input type='text' name='header' value='$header'></td>";
		echo "<td><input type='submit' name='action' value='update'></td>";
		echo "<input type='hidden' name='content_js' value='$content_js' readonly>";
		echo "<input type='hidden' name='content_ht' value='$content_ht' readonly>";
		echo "<input type='hidden' name='file_js' value='$file_js' readonly>";
		echo "<input type='hidden' name='file_ht' value='$file_ht' readonly>";
		echo "</tr><tr><td>TEASER:</td><td colspan='4'><input type='text' name='teaser' value='$teaser'></td>";
		echo "</form></tr></table><br><hr><br>";
		echo "<div id='pre' class='ql-editor'><h1>$header</h1><hr>".html_entity_decode($file_ht)."</div>";
	?>
		<div id="m-container">
			<div id="editor-container"></div>
		</div>
	</body>

	<script>
		var quill = new Quill('#editor-container', {
			modules: {
				toolbar: [
					['bold', 'italic', 'underline'],
					['link', 'blockquote', 'code-block'],
					
					['image', 'video'],
					
					[{ list: 'ordered' }, { list: 'bullet' }]
					[{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
					[{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
					[{ 'direction': 'rtl' }],                         // text direction

					[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
					[{ 'header': [1, 2, 3, 4, 5, 6, false] }],

					[{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
					[{ 'font': [] }],
					[{ align: '' }, { align: 'center' }, { align: 'right' }, { align: 'justify' }],

					['clean']  
				]
			},
			placeholder: 'Create a new article...',
			theme: 'snow'  // or 'bubble'
		});
		
		var form = document.querySelector('form');
		form.onsubmit = function() {
			// Populate hidden form on submit
			var file_ht = document.querySelector('input[name=file_ht]');
			var file_js = document.querySelector('input[name=file_js]');
			var myEditor = document.querySelector('#editor-container');
			file_ht.value = myEditor.querySelector('.ql-editor').innerHTML;
			file_js.value = JSON.stringify(quill.getContents());
		};
		
		var file_js = document.querySelector('input[name=file_js]');
		quill.setContents(JSON.parse(file_js.value));
	</script>
	
</html>