<?php include_once("includes/function.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            position: relative;
            display: flex;
            border: 1px solid #ccc;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            background: white;
            width: 80%;
            max-width: 800px;
            border-radius: 8px;
            flex-direction: column;
            overflow: hidden;
            margin: auto;
        }

        .details {
            flex: 3;
        }

        .image {
            position: absolute;
            right: 0px;
            transform: translate(-100px, 50px);
        }

        img {
            width: 100px;
            height: 100px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        h2,
        h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .print-button {
            text-align: center;
            margin-top: 50px;
        }

        .watermark {
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            opacity: 0.1;
            font-size: 8em;
            color: #000;
            pointer-events: none;
            z-index: 0;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10mm;
            }

            .image {
                position: static;
                transform: none;
                margin-bottom: 10px;
                text-align: center;
            }

            img {
                width: 80px;
                height: 80px;
            }

            h2 {
                font-size: 1.5em;
            }

            table {
                font-size: 0.9em;
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: 1.3em;
            }

            .container {
                width: 95%;
            }
        }

        .img2 {
            position: absolute;
        }
    </style>
</head>
<?php
if (isset($_REQUEST['st_id'])) {
    global $con;
    $id = $_REQUEST['st_id'];

    $sql = "SELECT * FROM student WHERE st_id='$id'";
    $rs = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($rs);
}
?>

<body >
    <script>
        function printOut() {
            window.print();
        }
    </script>

    <div class="container" style="background-color: #ccc;">
        <div class="watermark">VBSPU University</div>
        <div class="img2">
            <img src="image/vbslogo.jpeg">
        </div>
        <div>

            <div class="details">
                <h3 color="red"><u>E-Admit Card</u></h3>
                <h2>VBSPU University, Shaidabad Road Shahganj Jaunpur<br>Examination 2023 - 2024</h2>

                <table>
                    <tr>
                        <th>Student Id:</th>
                        <td><?= htmlspecialchars($data['st_id']); ?></td>
                        <td rowspan="6">
                            <img src="uploads/<?= htmlspecialchars($data['st_image']); ?>" alt="Image Not Found">
                        </td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td><?= htmlspecialchars($data['st_name']); ?></td>
                    </tr>
                    <tr>
                        <th>Father Name:</th>
                        <td><?= htmlspecialchars($data['st_fathername']); ?></td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td><?= htmlspecialchars($data['st_gen']); ?></td>
                    </tr>
                    <tr>
                        <th>Course:</th>
                        <td><?= get_single_value("course", "course_id", "course_name", $data['st_course']); ?></td>
                    </tr>
                    <tr>
                        <th>DOB:</th>
                        <td><?= htmlspecialchars($data['st_dob']); ?></td>
                    </tr>
                </table>

                <h3>Exam Details</h3>
                <table border="1" width="100%">
                    <thead>
                        <tr align="center">
                            <th>Exam Subject</th>
                            <th>Exam Shift</th>
                            <th>Exam Date</th>
                            <th>Exam Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM exam WHERE exam_course = '$data[st_course]'";
                        $rs = mysqli_query($con, $sql);
                        if (mysqli_num_rows($rs)) {
                            while ($examData = mysqli_fetch_assoc($rs)) {
                                ?>
                                <tr align="center">
                                    <td><?= get_single_value("subtable", "sub_id", "sub_name", $examData['exam_subject']); ?>
                                    </td>
                                    <td><?= $examData['exam_shift']; ?></td>
                                    <td><?= $examData['exam_date']; ?></td>
                                    <td><?= $examData['exam_decription']; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <p>
            <b>Note: </b>Please read instructions carefully given below before proceeding in the Examination.
        </p>

        <b><u>Instructions for students:-</u></b>
        <p align="justify" style="width:100%;">
            1. E-Admit Card Instructions <br>
            2. Please ensure all details are accurate before proceeding.<br>
            3. Carry this admit card to the examination venue.<br>
            4. Verify your identity with a valid photo ID along with the admit card.<br>
            5. Arrive at the exam center at least 30 minutes before the start time. <br>
            6. Do not bring any prohibited items, such as electronic devices or study materials.<br>
            7. Follow all exam regulations and instructions given by the invigilators.<br>
            8. In case of discrepancies, contact the examination authority immediately.<br>
            9. Keep this admit card safe until the completion of your exams.<br>
            10. Best of luck!
        </p>
        <label>
            <input type="checkbox" name="terms" id="terms">
            I have read and agree to the terms and conditions.
        </label>
        <div class="print-button">
            <input type="button" name="print" id="print" value="Print" disabled onclick="javascript:print()">
            <input type="button" value="Cancel" onClick="javascript:history.back()" />
           <a href="./downloadACard.php?id=<?= htmlspecialchars($_REQUEST['st_id']) ?>">Admit Card</a>

        </div>
    </div>

</body>
<script>
    const terms = document.getElementById("terms");
    const printBtn = document.getElementById("print");
    terms.addEventListener("click", (obj) => {
        if (obj.target.checked)
            printBtn.disabled = false;
        else
            printBtn.disabled = true;
    });
</script>

</html>