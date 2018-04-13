<div class="form">

    <ul class="tab-group">
      <li class="tab"><a href="#signup">Sign Up</a></li>
      <li class="tab active"><a href="#login">Log In</a></li>
    </ul>

    <div class="tab-content">

       <div id="login">
        <h1>Welcome Back!</h1>

        <form action="index.php" method="post" autocomplete="off">

          <div class="field-wrap">
          <label>
            Email Address<span class="req">*</span>
          </label>
          <input type="email" required autocomplete="off" name="email"/>
        </div>

        <div class="field-wrap">
          <label>
            Password<span class="req">*</span>
          </label>
          <input type="password" required autocomplete="off" name="password"/>
        </div>

        <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>

        <button class="button button-block" name="login" />Log In</button>

        </form>

      </div>

      <div id="signup">
        <h1>Sign Up for Free</h1>

        <form action="index.php" method="post" autocomplete="off">

        <div class="top-row">
          <div class="field-wrap">
            <label>
              First Name<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name='firstname' />
          </div>

          <div class="field-wrap">
            <label>
              Last Name<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name='lastname' />
          </div>
        </div>

        <div class="field-wrap">
          <label>
            Email Address<span class="req">*</span>
          </label>
          <input type="email"required autocomplete="off" name='email' />
        </div>

        <div class="field-wrap">
          <label>
            Set A Password<span class="req">*</span>
          </label>
          <input type="password"required autocomplete="off" name='password'/>
        </div>

        <button type="submit" class="button button-block" name="register" />Register</button>

        </form>

      </div>

    </div><!-- tab-content -->

</div> <!-- /form -->








<div class="container login">

    <!-- Kirjautumissivun headerteksti -->
    <div class="login-header">
        <h1>Lainausjärjestelmä</h1>
        <p>Tervetuloa käyttämään lainausjärjestelmää</p>
    </div>

    <!-- Käyttäjätunnus kenttä -->
    <div class="form-group">
        <label>Sähköpostiosoite:</label>
        <input type="email" class="form-control" placeholder="ptunnus@edu.sakky.fi" name="email" data-toggle="popover" data-trigger="hover" data-content="Syötä käyttäjätunnus" id="email">
    </div>

    <!-- Salasana kenttä -->
    <div class="form-group">
        <label>salasana:</label>
        <input type="password" class="form-control" placeholder="Salasana" name="password" data-toggle="popover" data-trigger="hover" data-content="Syötä salasana" id="password">
    </div>

    <!-- Submit -->
    <div class="form-check">
        <button type="button" name="login" class="btn btn-primary" data-toggle="popover" data-trigger="hover" data-content="kirjaudu sisään">Kirjaudu</button>
    </div>

</div>
