<div class="users form">
<?php echo $this->Session->flash('auth'); ?>

<?php echo $this->Form->create('Usuario');?>
    <fieldset>
        <legend>Login</legend>
        <?php echo $this->Form->input('email', array('label' => 'E-mail'));
        echo $this->Form->input('senha', array('type' => 'password'));
    ?>
    <input type="submit" class="btn btn-primary pull-right" value="Enviar" >
    </fieldset>
<?php echo $this->Form->end();?>
</div>