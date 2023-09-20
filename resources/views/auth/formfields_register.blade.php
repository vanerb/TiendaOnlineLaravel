
<div class="row mx-auto">
    <div class="form-group mb-3">
    <label class="col-md-12" for="name">
        <span >Nombre</span>
        <input class="form-control" type="text" name="name" id="name" autofocus="autofocus"> 
        <br>
        @error('name')
        <small >{{ $message }}</small>
    @enderror
    </label>
    </div>


    <div class="form-group mb-3">
    <label class="col-md-12" for="email">
        <span >Email</span>
        <input class="form-control" type="text" name="email" id="email" >
        <br>
        @error('email')
        <small>{{ $message }}</small>
    @enderror
    </label>
    </div>


    <div class="form-group mb-3">
    <label class="col-md-12" for="password">
        <span>Contraseña</span>
        <input class="form-control" type="password" type="text" name="password" id="password" >
        <br>
        @error('password')
        <small>{{ $message }}</small>
    @enderror
    </label>
    </div>

    <div class="form-group mb-3">
    <label class="col-md-12" for="password_confirmation">
        <span >Confirma la contraseña</span>
        <input class="form-control" type="password" type="text" name="password_confirmation" id="password_confirmation" >
        <br>
        @error('password_confirmation')
        <small>{{ $message }}</small>
    @enderror
    </label>
    </div>

</div>
