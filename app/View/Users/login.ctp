<?php echo $this->Form->create('User', array('class'=>'form-signin')); ?>
    <h2 class="form-signin-heading">Formulario de acceso</h2>
    <div class="login-wrap">
        <?php echo $this->Form->text('username', array('class'=>'form-control', 'placeholder'=>'Usuario')); ?>                
        <input type="password" name="data[User][password]" class="form-control" placeholder="Password">            
        <button class="btn btn-lg btn-login btn-block" type="submit">Ingresar</button>            
    </div>
</form>