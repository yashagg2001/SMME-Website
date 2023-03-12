<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:faculty.html');
}
$userName = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Update Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/download.png" rel="icon">
    <link href="assets/img/download.png" rel="apple-touch-icon">

    <script src="ckeditor/ckeditor.js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" /> -->
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
    <!-- <script src="https://unpkg.com/dropzone"></script> -->
    <script src="https://unpkg.com/cropperjs"></script>

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <!-- <link href="assets/css/variables.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
    <link href="assets/css/variables-orange.css" rel="stylesheet">
    <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

    <!-- ctalate Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- Partials loading script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script>
        $(function () {
            $("#head").load("header.html");
            $("#footer").load("footer.html");
            $("#hero").load("hero.html");
            $("#login-modal").load("login-modal.html");
            $("#about").load("about.html");
            $("#blog-posts").load("blog-posts.html");
            $("#clients").load("clients.html");
            $("#contact").load("contact.html");
            $("#cta").load("cta.html");
            $("#faq").load("faq.html");
            $("#featured-services").load("featured-services.html");
            $("#features").load("features.html");
            $("#fac-demo").load("fac-demo.html");
            $("#index").load("index.html");
            $("#on-focus").load("on-focus.html");
            $("#portfolio").load("portfolio.html");
            $("#pricing").load("pricing.html");
            $("#services").load("services.html");
            $("#team").load("team.html");
            $("#contact-us").load("contact-us.html");
            $("#testimonials").load("testimonials.html");
        });
    </script>

    <style>
        .image_area {
            position: relative;
            width: 15%;
            height: 15%;
        }

        img {
            display: block;
            max-width: 100%;
            cursor: pointer;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }

        .overlay {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.5);
            overflow: hidden;
            height: 0;
            transition: .5s ease;
            width: 100%;
        }

        .image_area:hover .overlay {
            height: 30%;
            cursor: pointer;
        }

        .text {
            color: #333;
            font-size: 15px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .dashboard {
            overflow: scroll;
        }

        /* table{
            position: absolute;
        } */
        td,
        th {
            /* position: absolute; */
            width: 200px !important;
            height: 30px !important;
            border: 0.5px solid gray !important;
        }

        .input-css {
            border: none !important;
            width: 100% !important;
            height: 100% !important;
        }

        .php-email-form {
            width: 90% !important;
            margin: auto;
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            align-items: center !important;
        }

        .profile-section {
            padding: 10px;
        }

        .edubtn {
            margin: 10px !important;
        }
        .delete-icon {
            color: red;
            cursor: pointer;
        }
    </style>

    <!-- show a textbox when other degree is selected in education section -->
    <script>
        function showDegreeOther() {
            let educationTable = document.getElementById("education-table");
            let degreeSelections = educationTable.getElementsByTagName("select");
            for (let i = 0; i < degreeSelections.length; i++) {
                let degreeSelection = degreeSelections[i];
                let degreeOther = degreeSelection.nextElementSibling;
                degreeSelection.addEventListener("change", function () {
                    if (degreeSelection.value === "Other") {
                        degreeOther.style.display = "inline";
                        degreeOther.required = true;
                    } else {
                        degreeOther.style.display = "none";
                    }
                });
            }
        }

        function autoSelectOption(value, ind) {
            var found = false;
            var id = "eduDegree".concat(ind);
            var select = document.getElementById(id);
            var options = select.options;
            for (var i = 0; i < options.length; i++) {
                if (options[i].value === value) {
                    select.selectedIndex = i;
                    found = true;
                    break;
                }
            }
            if (!found) {
                var id2 = "degreeOther".concat(ind);
                var input = document.getElementById(id2);
                input.value = value;
                input.style.display = "inline";
                select.selectedIndex = options.length - 1;
            }
        }

        window.addEventListener("load", function () {
            showDegreeOther();
        });
    </script>

</head>

<body>
    <div id="head"></div>
    <?php

    $data = file_get_contents('faculty.json');
    $arr = json_decode($data, true);
    $index = 0;
    foreach ($arr as $key => $value) {
        if ($value["mail"] == $userName) {
            $index = $key;
            break;
        }
    }
    $_SESSION['faculty_index'] = $index;

    ?>

    <h1 style="text-align:center">Faculty Profile Form</h1>
    <div class="image_area">
        <form method="post">
            <label for="upload_image">
                <img src="assets/img/team/<?php echo $arr[$index]["img"]; ?>" id="uploaded_image"
                    class="img-responsive img-circle" />
                <div class="overlay">
                    <div class="text">Click to Change Profile Image</div>
                </div>
                <input type="file" name="image" class="image" id="upload_image" style="display:none" />
            </label>
        </form>
    </div>

    <!-- Crop Modal Code -->

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Image Before Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="" id="sample_image" />
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="crop" class="btn btn-primary">Crop</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


    <main id="main">
        <section id="dashboard" class="dashboard">
            
            <!-- <form action="logout.php" method="post">
                <button type="submit">Logout</button>
            </form> -->

            <!-- start here -->
            <!-- Personal info -->
            
            <form action="data_update.php" method="post" id="faculty_update" enctype="multipart/form-data" role="form" class="php-email-form">
            <div class="profile-section">
                <h2>Personal Information:</h2>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="fname">Name:</label>
                        <input type="text" name="name" class="form-control" id="fname" value="<?php echo $arr[$index]["name"]; ?>" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="phone">Phone:</label> +91-1905-
                        <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $arr[$index]["phone"]; ?>" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" class="form-control" id="address" value="<?php echo $arr[$index]["address"]; ?>" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="post">Designation:</label>
                        <input type="text" name="post" class="form-control" id="post" value="<?php echo $arr[$index]["post"]; ?>" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="speciality">Specialisation:</label>
                        <input type="text" name="speciality" class="form-control" id="speciality" value="<?php echo $arr[$index]["speciality"]; ?>" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="gslink">Google Scholar Link:</label>
                        <input type="text" name="gslink" class="form-control" id="gslink" value="<?php echo $arr[$index]["gs"]; ?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="irinsid">IRINS ID:</label>
                        <input type="text" name="irinsid" class="form-control" id="irinsid" value="<?php echo $arr[$index]["irins"]; ?>">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="pplink">Personal Page Link(if any):</label>
                        <input type="text" name="pplink" class="form-control" id="pplink" value="<?php echo $arr[$index]["personal_page_link"]; ?>">
                    </div>
                </div>
            </div>
            <!-- Educational Details -->
            <div style="overflow: scroll;" class="profile-section">
                <h2>Education Details:</h3>
                    <div class="row">
                        <table id="education-table">
                            <tr>
                                <th>Degree</th>
                                <th>Specialization</th>
                                <th>Start Year</th>
                                <th>End Year</th>
                                <th>Place</th>
                                <th>Other Info</th>
                                <th>To Hide</th>
                                <th>Delete Action</th>
                            </tr>
                            <tbody>
                                <?php
                                foreach ($arr[$index]["education"] as $ind => $ed) {
                                    echo "<tr class='edutablerow'>";
                                    echo "<td><select class='input-css' id='eduDegree" . "$ind' name='degree[]' required>
                            <option value='' disabled selected>Select a Degree</option>
                            <option value='BTech'>BTech</option>
                            <option value='BTech - MTech (Dual)'>BTech - MTech (Dual)</option>
                            <option value='BSc'>BSc</option>
                            <option value='MTech'>MTech</option>
                            <option value='MSc'>MSc</option>
                            <option value='MS'>MS</option>
                            <option value='MTech - PhD'>MTech - PhD</option>
                            <option value='PhD'>PhD</option>
                            <option value='Masters'>Masters</option>
                            <option value='Bachelors'>Bachelors</option>
                            <option value='ME'>ME</option>
                            <option value='BE'>BE</option>
                            <option value='Other'>Other</option>
                        </select><input type='text' id='degreeOther" . "$ind' name='degreeOther[]' value='' style='display:none'></td>";
                                        echo "<script>autoSelectOption('{$ed['degree']}', '$ind');</script>";
                                        echo "<td><input type='text' class='input-css' name='specialization[]' value='{$ed['specialization']}'></td>";
                                        echo "<td><input type='text' class='input-css' name='start_year[]' value='{$ed['start_year']}' pattern='\d{4}' title='Enter valid year (4-digit)'></td>";
                                        echo "<td><input type='text' class='input-css' name='end_year[]' value='{$ed['end_year']}' pattern='\d{4}' title='Enter valid year (4-digit)'></td>";
                                        echo "<td><input type='text' class='input-css' name='place[]' value='{$ed['place']}' placeholder='University/College Name'></td>";
                                        echo "<td><input type='text' class='input-css' name='other_info[]' value='{$ed['other_info']}' placeholder='Thesis Title or Supervisor etc.'></td>";
                                        echo "<td><input type='checkbox' id='edCheckBox' name='edIsHidden[]' " . ($ed['isHidden'] ? "checked" : "") . "></td>";
                                        echo "<td><i class='fa fa-trash delete-icon' onclick='deleteEducation()'></i></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="text-center"><button type="button" class="edubtn"
                                    onclick="addEducation()">Add</button></div>
                        </div>
                </div>
                <!-- Text Areas -->
                <div class="profile-section">
                    <div class="row">
                        <div class="form-group mt-3 md-6">
                            <!-- <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required> -->
                            <h3>Publications:</h3>
                            <textarea class="form-control"
                                name="publications"><?php echo $arr[$index]["publications"]; ?></textarea>
                        </div>
                        <div class="form-group mt-3 md-6">
                            <h3>Research Interests:</h3>
                            <textarea class="form-control"
                                name="interests"><?php echo $arr[$index]["interests"]; ?></textarea>
                        </div>
                        <div class="form-group mt-3 md-6">
                            <h3>Current Projects:</h3>
                            <textarea class="form-control"
                                name="projects"><?php echo $arr[$index]["projects"]; ?></textarea>
                        </div>
                        <div class="form-group mt-3 md-6">
                            <h3>Current Openings for research:</h3>
                            <textarea class="form-control"
                                name="openings"><?php echo $arr[$index]["openings"]; ?></textarea>
                        </div>
                        <div class="form-group mt-3 md-6">
                            <h3>Work Experiences:</h3>
                            <textarea class="form-control"
                                name="experiences"><?php echo $arr[$index]["experiences"]; ?></textarea>
                        </div>
                        <div class="form-group mt-3 md-6">
                            <h3>Conferences:</h3>
                            <textarea class="form-control"
                                name="conferences"><?php echo $arr[$index]["conferences"]; ?></textarea>
                        </div>
                        <div class="form-group mt-3 md-6">
                            <h3>Scholarships, Awards, Honors, and Invited Talks:</h3>
                            <textarea class="form-control"
                                name="awards"><?php echo $arr[$index]["awards"]; ?></textarea>
                        </div>
                        <div class="form-group mt-3 md-6">
                            <h3>Other Activities:</h3>
                            <textarea class="form-control"
                                name="activity"><?php echo $arr[$index]["activity"]; ?></textarea>
                        </div>
                    </div>
                </div>
                <!-- IRINS Publications -->
                <div style="overflow: scroll;" class="profile-section">
                    <h2>IRINS Publications Details:</h2>
                    <small><i>
                            <?php echo htmlspecialchars("Note: In Title, use 'sub' tag (<sub> and </sub>) for subscript eg. CO2 should be written as CO<sub>2</sub>", ENT_QUOTES); ?>
                        </i></small><br>
                    <div class="row">
                        <table id="irins-pub-table">
                            <tr>
                                <th>Title</th>
                                <th>DOI</th>
                                <th>Year</th>
                                <th>Publication Date</th>
                                <th>Publication Type</th>
                                <th>Pages</th>
                                <th>Volume</th>
                                <th>Authors</th>
                                <th>Journal</th>
                                <th>Scopus Citations</th>
                                <th>Cross Ref Citations</th>
                                <th>To Hide</th>
                            </tr>
                            <tbody>
                                <?php
                                foreach ($arr[$index]["irins_pub"] as $ipub) {
                                    echo "<tr>";
                                    echo "<td><input type='text' class='input-css' name='ititle[]' value='{$ipub['title']}' required></td>";
                                    echo "<td><input type='text' class='input-css' name='idoi[]' value='{$ipub['DOI']}'></td>";
                                    echo "<td><input type='text' class='input-css' name='iyear[]' pattern='\d{4}' title='Enter valid year (4-digit)' value='{$ipub['year']}'></td>";
                                    echo "<td><input type='text' class='input-css' name='ipubDate[]' value='{$ipub['publicationDate']}'></td>";
                                    echo "<td><input type='text' class='input-css' name='ipubType[]' value='{$ipub['publicationType']}'></td>";
                                    echo "<td><input type='text' class='input-css' name='ipages[]' value='{$ipub['pages']}'></td>";
                                    echo "<td><input type='text' class='input-css' name='ivolume[]' value='{$ipub['volume']}'></td>";
                                    echo "<td><input type='text' class='input-css' name='iauthors[]' value='{$ipub['authors']}'></td>";
                                    echo "<td><input type='text' class='input-css' name='ijournal[]' value='{$ipub['journal']}'></td>";
                                    echo "<td><input type='text' class='input-css' name='iscopusC[]' value='{$ipub['scopusCitations']}'></td>";
                                    echo "<td><input type='text' class='input-css' name='icrossrefC[]' value='{$ipub['crossrefCitations']}'></td>";
                                    echo "<td><input type='checkbox' id='iCheckBox' name='iIsHidden[]' " . ($ipub['isHidden'] ? "checked" : "") . "></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="text-center"><button type="button" class="edubtn"
                            onclick="addIRINSPub()">Add</button><button type="button" id="delIPB" class="edubtn"
                            onclick="deleteIRINSPub()">Delete</button></div>
                    <!-- <button type="button" onclick="addIRINSPub()">Add</button>
                    <button type="button" id="delIPB" onclick="deleteIRINSPub()">Delete</button><br><br> -->
                    <!-- <input type="submit" value="Update Changes"> -->
                </div>

                <div class="text-center"><button type="submit" class="edubtn">Update Changes</button></div>
            </form>

        </section>

    </main><!-- End #main -->

    <div id="footer"></div>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- ctalate Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- Font Awesome Icons -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</body>

</html>

<!-- Cropping functionality enable script -->
<script>
    $(document).ready(function () {

        var $modal = $('#modal');

        var image = document.getElementById('sample_image');

        var cropper;

        $('#upload_image').change(function (event) {
            var files = event.target.files;

            var done = function (url) {
                image.src = url;
                $modal.modal('show');
            };

            if (files && files.length > 0) {
                reader = new FileReader();
                reader.onload = function (event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });

        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        $('#crop').click(function () {
            canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400
            });

            canvas.toBlob(function (blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    var base64data = reader.result;
                    $.ajax({
                        url: 'upload.php',
                        method: 'POST',
                        data: {
                            image: base64data
                        },
                        success: function (data) {
                            // console.log(data);
                            $modal.modal('hide');
                            $('#uploaded_image').attr('src', data);
                        }
                    });
                };
            });
        });

    });
</script>

<script>
    CKEDITOR.replace("publications");
    CKEDITOR.replace("interests");
    CKEDITOR.replace("projects");
    CKEDITOR.replace("openings");
    CKEDITOR.replace("experiences");
    CKEDITOR.replace("conferences");
    CKEDITOR.replace("awards");
    CKEDITOR.replace("activity");

    function addEducation() {
        var table = document.getElementById("education-table");
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        var cell8 = row.insertCell(7);
        cell1.innerHTML = `<select name="degree[]" class='input-css' required>
                        <option value="" disabled selected>Select a Degree</option>
                        <option value="BTech">BTech</option>
                        <option value="BTech - MTech (Dual)">BTech - MTech (Dual)</option>
                        <option value="BSc">BSc</option>
                        <option value="MTech">MTech</option>
                        <option value="MSc">MSc</option>
                        <option value="MS">MS</option>
                        <option value="MTech - PhD">MTech - PhD</option>
                        <option value="PhD">PhD</option>
                        <option value="Masters">Masters</option>
                        <option value="Bachelors">Bachelors</option>
                        <option value="ME">ME</option>
                        <option value="BE">BE</option>
                        <option value="Other">Other</option>
                    </select><input type="text" name="degreeOther[]" value="" style="display:none">`;
        cell2.innerHTML = `<input type="text" class='input-css' name="specialization[]">`;
        cell3.innerHTML = `<input type="text" class='input-css' name="start_year[]" pattern="\\d{4}" title="Enter valid year (4-digit)">`;
        cell4.innerHTML = `<input type="text" class='input-css' name="end_year[]" pattern="\\d{4}" title="Enter valid year (4-digit)">`;
        cell5.innerHTML = `<input type="text" class='input-css' name="place[]" placeholder="University/College Name">`;
        cell6.innerHTML = `<input type="text" class='input-css' name="other_info[]" placeholder="Thesis Title or Supervisor etc.">`;
        cell7.innerHTML = `<input type="checkbox" id="edCheckBox" name="edIsHidden[]">`;
        cell8.innerHTML = `<i class='fa fa-trash delete-icon' onclick="deleteEducation()"></i>`;
        showDegreeOther();

    }

    function deleteEducation() {
        var table = document.getElementById("education-table");

        table.addEventListener('click', event => {
        // Check if the clicked element is a delete button
            if (event.target.classList.contains('delete-icon')) {
                // Get the row to delete
                var row = event.target.closest('tr');
                row.remove();
            }
        });
    }

    function addIRINSPub() {
        var table = document.getElementById("irins-pub-table");
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        var cell8 = row.insertCell(7);
        var cell9 = row.insertCell(8);
        var cell10 = row.insertCell(9);
        var cell11 = row.insertCell(10);
        var cell12 = row.insertCell(11);
        cell1.innerHTML = `<input type="text" class='input-css' name="ititle[]" required>`;
        cell2.innerHTML = `<input type="text" class='input-css' name="idoi[]">`;
        cell3.innerHTML = `<input type="text" class='input-css' name="iyear[]" pattern="\\d{4}" title="Enter valid year (4-digit)">`;
        cell4.innerHTML = `<input type="text" class='input-css' name="ipubDate[]">`;
        cell5.innerHTML = `<input type="text" class='input-css' name="ipubType[]">`;
        cell6.innerHTML = `<input type="text" class='input-css' name="ipages[]">`;
        cell7.innerHTML = `<input type="text" class='input-css' name="ivolume[]">`;
        cell8.innerHTML = `<input type="text" class='input-css' name="iauthors[]">`;
        cell9.innerHTML = `<input type="text" class='input-css' name="ijournal[]">`;
        cell10.innerHTML = `<input type="text" class='input-css' name="iscopusC[]">`;
        cell11.innerHTML = `<input type="text" class='input-css' name="icrossrefC[]">`;
        cell12.innerHTML = `<input type="checkbox" id="iCheckBox" name="iIsHidden[]">`;
        if (table.rows.length >= 1) {
            document.getElementById("delIPB").disabled = false;
        }

    }

    function deleteIRINSPub() {
        var table = document.getElementById("irins-pub-table");
        var rows = table.rows;
        var lastRow = rows[rows.length - 1];
        table.deleteRow(lastRow.rowIndex);
        if (rows.length == 1) {
            document.getElementById("delIPB").disabled = true;
        }

    }

    // this is for getting the info of all the To_Hide checkboxes

    document.getElementById('faculty_update').addEventListener('submit', function (event) {
        var edcheckboxes = this.querySelectorAll('input#edCheckBox');

        // Add a hidden field for each education block checkbox
        for (var i = 0; i < edcheckboxes.length; i++) {
            var hiddenField = document.createElement('input');
            hiddenField.setAttribute('type', 'hidden');
            hiddenField.setAttribute('name', 'educationIsHidden[]');
            hiddenField.setAttribute('value', edcheckboxes[i].checked ? 'on' : 'off');
            this.appendChild(hiddenField);
        }

        var irinscheckboxes = this.querySelectorAll('input#iCheckBox');

        // Add a hidden field for each irins pub block checkbox
        for (var i = 0; i < irinscheckboxes.length; i++) {
            var hiddenField2 = document.createElement('input');
            hiddenField2.setAttribute('type', 'hidden');
            hiddenField2.setAttribute('name', 'irinsIsHidden[]');
            hiddenField2.setAttribute('value', irinscheckboxes[i].checked ? 'on' : 'off');
            this.appendChild(hiddenField2);
        }
    });

</script>