<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set the character encoding to UTF-8 -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <!-- Specify the compatibility mode for Internet Explorer -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Set the viewport to control the layout on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Set the title of the web page -->
    <title>PDF to Text Extractor</title>
    <!-- Include the PDF.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js" integrity="sha512-ml/QKfG3+Yes6TwOzQb7aCNtJF4PUyha6R3w8pSTo/VJSywl7ZreYvvtUso7fKevpsI+pYVVwnu82YO0q3V6eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Add some styling for the web page -->
</head>
<body>
    <video autoplay muted loop>
        <source src="img/mainpage.mp4" type="video/mp4">
    </video>

     <!-- Display the heading -->
     <div class="afterupload">
            <!-- Display text "Select Page" -->
            <span>Select Page</span>
            <!-- Dropdown menu for selecting the page -->
            <select class="selectpage" onchange="afterProcess()"></select>
            <!-- Download link for the extracted text file -->
            <a href="" class="download" download>Download Pdf Text</a>
            <!-- Textarea to display the extracted text -->
            <textarea class="pdftext"></textarea>
            <h1>Do You Need Diet ?</h1>
    <button onclick="redirectToNewPage('yes')">Yes</button>
    <button onclick="redirectToNewPage('no')">No</button>
        </div>
        
     
    <!-- Create a div container for the file upload form and result section -->
    <div class="pdfwork">
    <h1>   Welcome<br/></h1>
        <!-- Button to extract another PDF (hidden initially) -->
        <button class="another" onclick="location.reload()">Extract Another PDF</button>
        <!-- Display text "Select PDF" -->
        <h1><span>Select PDF</span></h1>
        <!-- File input field for selecting the PDF file -->
        <input type="file" class="selectpdf">
        <!-- Display text "Password :" -->
        <span>Password :</span>
        <!-- Password input field (optional) -->
        <input type="password" class="pwd" placeholder='optional'>
        <!-- Button to upload the selected PDF -->
        <button class="upload" onclick="showCustomCode()">Upload</button>
        <!-- Result section (hidden initially) -->
        <!-- Custom code section (hidden initially) -->
        <div class="customCode">
            <h2>This is the custom code section</h2>
            <!-- Add your custom HTML code here -->
        </div>
    </div>
    <!-- JavaScript code -->
    <script>
        function showCustomCode() {
            // Hide the upload section
            document.querySelector(".pdfwork").style.display = "none";
            // Show the custom code section
            document.querySelector(".customCode").style.display = "flex";
        }
        
        function redirectToNewPage(choice) {
            if (choice === 'yes') {
                window.location.href = 'Diet.php'; 
            } else if (choice === 'no') {
                window.location.href = 'index.php'; 
            }
        }

        // ... (Your existing code)

        // Function to handle the post-processing after text extraction
        function afterProcess() {
            pdftext.value = alltext[select.value - 1]; // Display the extracted text for the selected page
            download.href = "data:text/plain;charset=utf-8," + encodeURIComponent(alltext[select.value - 1]); // Set the download link URL for the extracted text
            afterupload.style.display = "flex"; // Display the result section
            document.querySelector(".another").style.display = "unset"; // Display the "Extract Another PDF" button

            // Add your custom logic here based on the extracted text
            if (pdftext.value.includes('specific text')) {
                // Perform specific actions or display specific HTML code
                alert('This PDF contains specific text!');
                // You can show or modify HTML elements here
            }
        }
    </script>
   

<script>
    // Set the worker source for PDF.js library
    pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.worker.min.js";
    
    // Get references to various elements
    let pdfinput = document.querySelector(".selectpdf"); // Reference to the PDF file input field
    let pwd = document.querySelector(".pwd"); // Reference to the password input field
    let upload = document.querySelector(".upload"); // Reference to the upload button
    let afterupload = document.querySelector(".afterupload"); // Reference to the result section
    let select = document.querySelector("select"); // Reference to the page selection dropdown
    let download = document.querySelector(".download"); // Reference to the download link
    let pdftext = document.querySelector(".pdftext"); // Reference to the text area for displaying extracted text
    
    // Event listener for the upload button click
    upload.addEventListener('click', () => {
        let file = pdfinput.files[0]; // Get the selected PDF file
        if (file != undefined && file.type == "application/pdf") {
            let fr = new FileReader(); // Create a new FileReader object
            fr.readAsDataURL(file); // Read the file as data URL
            fr.onload = () => {
                let res = fr.result; // Get the result of file reading
                if (pwd.value == "") {
                    extractText(res, false); // Extract text without password
                } else {
                    extractText(res, true); // Extract text with password
                }
            }
        } else {
            alert("Select a valid PDF file");
        }
    });
    
    let alltext = []; // Array to store all extracted text
    
    // Asynchronous function to extract text from the PDF
    async function extractText(url, pass) {
        try {
            let pdf;
            if (pass) {
                pdf = await pdfjsLib.getDocument({ url: url, password: pwd.value }).promise; // Get the PDF document with password
            } else {
                pdf = await pdfjsLib.getDocument(url).promise; // Get the PDF document without password
            }
            let pages = pdf.numPages; // Get the total number of pages in the PDF
            for (let i = 1; i <= pages; i++) {
                let page = await pdf.getPage(i); // Get the page object for each page
                let txt = await page.getTextContent(); // Get the text content of the page
                let text = txt.items.map((s) => s.str).join(""); // Concatenate the text items into a single string
                alltext.push(text); // Add the extracted text to the array
            }
            alltext.map((e, i) => {
                select.innerHTML += `<option value="${i+1}">${i+1}</option>`; // Add options for each page in the page selection dropdown
            });
            afterProcess(); // Display the result section
        } catch (err) {
            alert(err.message);
        }
    }
    
    
</script>
	</body>
</html>

