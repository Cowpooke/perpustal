<?php include 'top_bar.php'; ?>                
                <?php  
                
                              if($row['role'] == "admin") {
                                include "search.php";
                              } elseif ($row['role'] == "member") {
                                  include "search.php";
                              };
?>
<?php include 'bottom_bar.php'; ?>   




