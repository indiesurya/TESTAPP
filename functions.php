<?php
$conn = mysqli_connect("localhost", "root", "", "testapp");


function registrasi($data){
    global $conn;

    $name = $data["name"];
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $copassword = mysqli_real_escape_string($conn, $data["copassword"]);

    #cek email sudah terdaftar atau belum
    $result = mysqli_query($conn, "SELECT email FROM users WHERE email ='$email'");
    if (mysqli_fetch_assoc($result)){
        echo 
        "
        <script>
            alert('email telah terdaftar');
        </script>
        ";
        return false;
    }

    if($password !== $copassword){
        echo
        "
        <script>
            alert('password dengan konfirmasi password berbeda');
        </script>
        ";
        return false; 
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query ($conn, "INSERT INTO users VALUES ('', '$name', '$email', '$password')");

    return mysqli_affected_rows($conn);
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function addtask($data){
    global $conn;

    $name_task = $data["name_task"];
    $desc_task = $data["desc_task"];
    $date_created = $data["date_created"];
    $userlogin = $_SESSION["user"];
    $id_user = $userlogin["id_user"];
    mysqli_query($conn,"INSERT INTO tasks VALUES
                ('','$name_task','$desc_task','$date_created')");
    $tampil = mysqli_query($conn, "SELECT LAST_INSERT_ID()");
    while ($r = mysqli_fetch_array($tampil)) {
        $id_task = $r[0];
    }
    mysqli_query($conn, "INSERT INTO koneksi_tasl VALUES ('','$id_user','$id_task')");
    return mysqli_affected_rows($conn);
}

function addnew($data){
    global $conn;

    $name_task = $data["name_task"];
    $desc_task = $data["desc_task"];

    $id_task = $_GET["id_task"];
    mysqli_query($conn, "INSERT INTO new VALUES ('','$id_task','$name_task','$desc_task')");

    return mysqli_affected_rows($conn);
}
function addproblem($data){
    global $conn;

    $name_task = $data["name_task"];
    $test_steps = $data["test_steps"];
    $test_data = $data["test_data"];
    $exp_result = $data["exp_result"];
    $result = $data["result"];
    $source = upload();

    if(!'source'){
        return false;
    }

    $id_task = $_GET["id_task"];
    mysqli_query($conn, "INSERT INTO problem VALUES ('','$id_task','$name_task','$test_steps','$test_data','$exp_result','$result','$source')");
    

    return mysqli_affected_rows($conn);
}
function addprogress($data)
{
    global $conn;

    $name_task = $data["name_task"];
    $test_steps = $data["test_steps"];
    $test_data = $data["test_data"];
    $exp_result = $data["exp_result"];
    $result = $data["result"];
    $source = upload();

    if (!'source') {
        return false;
    }

    $id_task = $_GET["id_task"];
    mysqli_query($conn, "INSERT INTO progress VALUES ('','$id_task','$name_task','$test_steps','$test_data','$exp_result','$result','$source')");

    return mysqli_affected_rows($conn);
}
function addtesting($data)
{
    global $conn;

    $name_task = $data["name_task"];
    $test_steps = $data["test_steps"];
    $test_data = $data["test_data"];
    $exp_result = $data["exp_result"];
    $result = $data["result"];
    $source = upload();

    if (!'source') {
        return false;
    }

    $id_task = $_GET["id_task"];
    mysqli_query($conn, "INSERT INTO testing VALUES ('','$id_task','$name_task','$test_steps','$test_data','$exp_result','$result','$source')");

    return mysqli_affected_rows($conn);
}
function addcomplete($data)
{
    global $conn;

    $name_task = $data["name_task"];
    $test_steps = $data["test_steps"];
    $test_data = $data["test_data"];
    $exp_result = $data["exp_result"];
    $result = $data["result"];
    $source = upload();

    if (!'source') {
        return false;
    }

    $id_task = $_GET["id_task"];
    mysqli_query($conn, "INSERT INTO complete VALUES ('','$id_task','$name_task','$test_steps','$test_data','$exp_result','$result','$source')");

    return mysqli_affected_rows($conn);
}

function hapusnew($id_new){
    global $conn;

    mysqli_query($conn, "DELETE FROM new WHERE id_new = $id_new");

    return mysqli_affected_rows($conn);
}
function hapuscomplete($id_complete)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM complete WHERE id_complete = $id_complete");

    return mysqli_affected_rows($conn);
}
function hapusproblem($id_problem)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM problem WHERE id_problem = $id_problem");

    return mysqli_affected_rows($conn);
}
function hapusprogress($id_progress)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM progress WHERE id_progress = $id_progress");

    return mysqli_affected_rows($conn);
}
function hapustesting($id_testing)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM testing WHERE id_testing = $id_testing");

    return mysqli_affected_rows($conn);
}
function hapustask($id_task)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM tasks WHERE id_task = $id_task");

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['source']['name'];
    $ukuranFile = $_FILES['source']['size'];
    $error = $_FILES['source']['error'];
    $tmpName = $_FILES['source']['tmp_name'];
    
    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiValid)) {
        echo "<script>alert('Upload Gambar!!');</script>";
    }
    if ($ukuranFile > 1000000) {
        echo "<script>Maksimal ukuran gambar yaitu 1 MB</script>";
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'assets/img/' .$namaFileBaru);

    return $namaFileBaru;
}

function updproblem($data){
    global $conn;

    $name_task = $data["name_task"];
    $test_steps = $data["test_steps"];
    $test_data = $data["test_data"];
    $exp_result = $data["exp_result"];
    $result = $data["result"];
    $source = update();

    if(!'source'){  
        return false;
    }
    $id_problem = $_GET["id_problem"];
    mysqli_query($conn,"UPDATE problem SET
    name_task = '$name_task',
    test_steps = '$test_steps',
    test_data = '$test_data',
    exp_result = '$exp_result',
    result = '$result',
    source = '$source'

    WHERE id_problem = $id_problem
    
    ");

    return mysqli_affected_rows($conn);
}

function update()
{
    $namaFile = $_FILES['source']['name'];
    $ukuranFile = $_FILES['source']['size'];
    $error = $_FILES['source']['error'];
    $tmpName = $_FILES['source']['tmp_name'];

    $oldfile = $_POST["old"];
    if ($error === 4) {
        $namaFileBaru = $oldfile;
    }
    else {
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiValid)) {
        echo "<script>alert('Upload Gambar!!');</script>";
    }
    if ($ukuranFile > 1000000) {
        echo "<script>Maksimal ukuran gambar yaitu 1 MB</script>";
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
    }
    return $namaFileBaru;
}

function updprogress($data){
    global $conn;

    $name_task = $data["name_task"];
    $test_steps = $data["test_steps"];
    $test_data = $data["test_data"];
    $exp_result = $data["exp_result"];
    $result = $data["result"];
    $source = update();

    if (!'source') {
        return false;
    }
    $id_progress = $_GET["id_progress"];
    mysqli_query($conn, "UPDATE progress SET
    name_task = '$name_task',
    test_steps = '$test_steps',
    test_data = '$test_data',
    exp_result = '$exp_result',
    result = '$result',
    source = '$source'

    WHERE id_progress = $id_progress
    
    ");

    return mysqli_affected_rows($conn);
}

function updtesting($data)
{
    global $conn;

    $name_task = $data["name_task"];
    $test_steps = $data["test_steps"];
    $test_data = $data["test_data"];
    $exp_result = $data["exp_result"];
    $result = $data["result"];
    $source = update();

    if (!'source') {
        return false;
    }
    $id_testing = $_GET["id_testing"];
    mysqli_query($conn, "UPDATE testing SET
    name_task = '$name_task',
    test_steps = '$test_steps',
    test_data = '$test_data',
    exp_result = '$exp_result',
    result = '$result',
    source = '$source'

    WHERE id_testing = $id_testing
    
    ");

    return mysqli_affected_rows($conn);
}

function updcomplete($data)
{
    global $conn;

    $name_task = $data["name_task"];
    $test_steps = $data["test_steps"];
    $test_data = $data["test_data"];
    $exp_result = $data["exp_result"];
    $result = $data["result"];
    $source = update();

    if (!'source') {
        return false;
    }
    $id_complete = $_GET["id_complete"];
    mysqli_query($conn, "UPDATE complete SET
    name_task = '$name_task',
    test_steps = '$test_steps',
    test_data = '$test_data',
    exp_result = '$exp_result',
    result = '$result',
    source = '$source'

    WHERE id_complete = $id_complete
    
    ");

    return mysqli_affected_rows($conn);
}
function updnew($data){
    global $conn;

    $name_task = $data["name_task"];
    $desc_task = $data["desc_task"];
    $id_new = $_GET["id_new"];
    mysqli_query($conn,"UPDATE new SET name_task = '$name_task', desc_task = '$desc_task' WHERE id_new = $id_new");
    return mysqli_affected_rows($conn);
}

function updtask($data)
{
    global $conn;

    $name_task = $data["name_task"];
    $desc_task = $data["desc_task"];
    $date_created= $data["date_created"];
    $id_task = $_GET["id_task"];
    mysqli_query($conn, "UPDATE tasks SET name_task = '$name_task', desc_task = '$desc_task' , date_created = '$date_created' WHERE id_task = $id_task");
    return mysqli_affected_rows($conn);
}

?>