<?php require_once('includes/header.php'); ?>
<form class="contact">
    <h1 class="text-center">Contact</h1>
    <div class="row">
        <div class="col-12">
            <div class="w-50 m-auto">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                <label for="gender"> Select you gender</label>
                <select name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
            </div>
            <input type="submit" value="Submit" class="submit">
        </div>
    </div>
</form>
<?php require_once('includes/footer.php'); ?>