<?php

if (isset($_POST['Sending'])) {
    $param = json_decode($_POST['Sending']);

    $qun = $param->qun;
    $op1 = $param->op1;
    $op2 = $param->op2;
    $op3 = $param->op3;
    $op4 = $param->op4;
    $cops = $param->cops;
    $temp = array('outmsg' => 'outside');

    try {
        $con = mysqli_connect("localhost", "root", "", "mcq");
        if ($con) {

            $temp = array('outmsg' => 'Successfully');
            $sql = "INSERT INTO mcq(question,op1,op2,op3,op4,op) VALUES ('" . $qun . "','" . $op1 . "','" . $op2 . "','" . $op3 . "','" . $op4 . "'," . $cops . ")";
            $abc = mysqli_query($con, $sql);
            $temp = array('outmsg' => 'Successfully Query Run');
            mysqli_close($con);
            echo json_encode($temp);
        }
    } catch (Exception $e) {
    }
}

if (isset($_POST['Retreiving'])) {
    
    $temp = array('outmsg' => 'outside');

    try {
        $con = mysqli_connect("localhost", "root", "", "mcq");
        if ($con) {
            $sql = "SELECT * from mcq";
            $abc = mysqli_query($con, $sql);
            $g=mysqli_num_rows($abc);
            $temp = array('Number' => $g);
            for($i=1;$i<=$g;$i++){
                $tuple=mysqli_fetch_array($abc);
                $temp[$i]["ques"]="Q.".$tuple['question'];
                $temp[$i]["op1"]="1)".$tuple['op1'];
                $temp[$i]["op2"]="2)".$tuple['op2'];
                $temp[$i]["op3"]="3)".$tuple['op3'];
                $temp[$i]["op4"]="4)".$tuple['op4'];
                $temp[$i]["op"]=$tuple['op'];
            }
            mysqli_close($con);
            echo json_encode($temp);
        }
    } catch (Exception $e) {
    }

}
?>