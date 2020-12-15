<div class="sign col-lg-7 col-sm-10 col-11 animated zoomIn">
    <h5 class="text-center"><?php echo getlang(" حجز  " ," Make_appointment ");  ?></h5>
    <form method="post" id="signUp_form" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
        <div class="row">
            <div class="offset-md-1 col-md-5 col-10 offset-1">
                <label for="name">Enter Your Name</label>
                <input id="name" type="text" name="name" placeholder="">
            </div>

            <div class="col-md-5 offset-md-0 col-10 offset-1">
                <label for="no">Enter National Number</label>
                <input id="no"  type="text" name="no" placeholder="">
            </div>

            <div class="offset-md-1 col-md-5 col-10 offset-1">
                <select id="clinic" name="clinic" data-toggle="toolyip" data-placement="top">
                    <option value="0" disabled selected>Choose Clinic...</option>
                    <option value="1" class="optionColor">Internal</option>
                    <option value="2" class="optionColor">Dentist</option>
                </select>
            </div>

            <div class="col-md-5 offset-md-0 col-10 offset-1">
                <label for="datepicker"></label>
                <input type="date" id="datepicker">
            </div>

            <div class=" col-10 offset-1 col-md-6 offset-md-3">
                <select name="time">
                    <option value="0" selected disabled>Choose a Time</option>
                    <option value="1">9:00 a.m.</option>
                    <option>9:00 a.m.</option>
                    <option>9:00 a.m.</option>
                    <option>9:00 a.m.</option>
                    <option>9:00 a.m.</option>
                </select>
            </div>

            <div class="text-center col-12" >
                <button type="submit" class="btn btn-danger btn-lg center-block">Done</button>
            </div>
        </div>
    </form>
    <div  class="foot center-block">
        <span>If You Sign Up</span>
        <a href="home/signin">Log In</a>
    </div>
</div>
