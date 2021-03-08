<!DOCTYPE html>
<html >
<head>
    
    <title>Regestration Form</title>
    <script src="registration_src/jquery.min.js"></script>
    <script src="registration_src/bootstrap.min.js"></script>
    <link rel="stylesheet" href="registration_src/bootstrap.min.css">
    <script src="registration_src/gallery.js"></script>
    <link rel="stylesheet" href="registration_src/style.css">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="check_register.php">
                        <h2 class="form-title">Create account</h2>
                        <select class="custom-select custom-select-lg mb-3" id="categeory" name="user_type">
                            <option value="student">Student</option>
                            <option value="mess_manager">Mess Manager</option>
                            <option value="warden">Warden</option>
                            <option value="clerk">Clerk</option>
                            <option value="attendant_and_gardener">Attendents & Gardenres</option>
                          </select>
                        
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name" required />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required/>
                        </div>
                        
                        <div class="row row-space extra ">
                            
                            
                                <div class=" col- ml-5 mr-5">
                                    <label class="label ">Gender</label>
                                    <div class="">
                                    <div class="custom-control custom-radio ">
                                        <input type="radio" required="required" id="customRadioInline12" name="customRadioInline12" class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="customRadioInline12">Male</label>
                                      </div>
                                      <div class="custom-control custom-radio ">
                                        <input type="radio" id="customRadioInline23" name="customRadioInline12" class="custom-control-input" value="0">
                                        <label class="custom-control-label" for="customRadioInline23">Female</label>
                                      </div>
                                    </div>
                                </div>
                            
                            
                                <div class=" col-  mr-sm-5">
                                    <label class="label ">Room Sharing</label>
                                    <div class="">
                                        <div class="custom-control custom-radio ">
                                            <input type="radio" required="required" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                          </div>
                                          <div class="custom-control custom-radio ">
                                            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="customRadioInline2">No</label>
                                          </div>
                                        
                                    </div>
                                </div>
                            
                                <div class="col-">
                                    <label class="label">Extra Amenties</label>
                                    <div class="">
                                        <div class="custom-control custom-radio ">
                                            <input type="radio" id="customRadioInline11" required="required" name="customRadioInline11" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="customRadioInline11">Yes</label>
                                        </div>
                                      <div class="custom-control custom-radio ">
                                            <input type="radio" id="customRadioInline22" name="customRadioInline11" class="custom-control-input" value="0">
                                            <label class="custom-control-label" for="customRadioInline22">No</label>
                                      </div>
                                    
                                    </div>
                                </div>
                            
                        </div>
                        
                        
                        <div>
                                <select name="hall" id="first-choice" required="required" class="custom-select custom-select-lg  mt-10 extra">
                                    <option value='1'>Hall One</option>
                                    <option value='2'>Hall Two</option>
                                </select>
                                <div class="select-dropdown extra"></div>
                        </div>
                       
                        <div>
                            <select name="staff_type"  required="required" id="first-choice2" class="custom-select custom-select-lg  mt-10 extra">
                                
                                <option value='Attendant'>Attendant</option>
                                 <option value='Gardener'>Gardener</option>
                            </select>
              	            <div class="select-dropdown extra"></div>
                        </div>

                       	 <div class="form-group">
                            <input type="number" class="form-input" name="contact" id="contact" placeholder="Contact Number" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password" required/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="address" id="address" placeholder="Enter Your Address" required/>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit btn btn-dark" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="#" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

   
</body>
</html>