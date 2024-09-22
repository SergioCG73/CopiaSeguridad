<?php        
    $id = $_GET['id'];
?>

<script>
    var id = "<?php echo $id; ?>";
    respuesta = confirm("¿Seguro que desea borrar la fabricación nº " + id + "?");

    if (respuesta){
        window.location.href = "delete.php?id=<?php echo $id; ?>";
    }
    else {
        window.location.href = "_index.html";
    }
</script>