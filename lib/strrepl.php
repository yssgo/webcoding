 <?php
$subject="첫번째 테스트용 글입니다. 첫번째 테스트용 글입니다.  첫번째 테스트용 글입니다. ";

$search = "테스트";
$replace="<strong>테스트</strong>";
$new_string=str_ireplace($search,$replace,$subject);
echo $new_string;
 ?>
 