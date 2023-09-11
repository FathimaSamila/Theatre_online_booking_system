
<?php
if(isset($_SESSION['book']))
{

?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?= $_SESSION['book']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php 
    unset($_SESSION['book']);
}

if(isset($_SESSION['notbook']))
{

?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?= $_SESSION['notbook']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php 
    unset($_SESSION['notbook']);
}

?>
<?php
if(isset($_SESSION['seat']))
{
?> 
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="background-color:blue ; color:white">
    <?= $_SESSION['seat']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="color:white ;"></button>
</div>
    <?php 
    unset($_SESSION['seat']);
} 
