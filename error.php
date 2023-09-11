<?php

if(isset($_SESSION['Rgerror']))
{
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?= $_SESSION['Rgerror']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php

unset($_SESSION['Rgerror']);
}

?>