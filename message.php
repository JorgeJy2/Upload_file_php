<?php 

function showMsgError($message, $href)
{
  echo "<script>";
  echo "Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: '$message'
  }).then(()=> {
    window.location = '$href';
  })";
  echo "</script>";
}
?>