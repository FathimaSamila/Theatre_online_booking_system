<?php
if(isset($_SESSION['success']))
{
?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $_SESSION['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
        unset($_SESSION['success']);
}

?>

<?php
if(isset($_SESSION['status']))
{
?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $_SESSION['status']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
        unset($_SESSION['status']);
}

?>


<?php
if(isset($_SESSION['message']))
{

?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?= $_SESSION['message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php 
    unset($_SESSION['message']);
}
?>
