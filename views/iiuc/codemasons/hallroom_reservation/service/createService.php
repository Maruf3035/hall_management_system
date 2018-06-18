<?php include_once('../../header.php')?>
<?php include_once('../../slider2.php') ?>


<div class="container">

    <h1 class="available_convention_title wow slideInUp"> Services <br> <small> Select from below </small> </h1>

    <form action="serviceStore.php" id="service_Form" method="post">
        <div class="row">

            <div class="col-md-4 wow fadeInRight" data-wow-duration="1s">
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='foodBeverage' value='Food & Beverage'> Food & Beverage </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='water' value='Water Service'> Water Service </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='decoration' value='Decoration'> Decoration </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='lighting' value='Lighting'> Lighting </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='staging' value='Staging'> Staging </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='catering' value='Catering'> Catering </label>
                </div>
            </div> <!-- end col-md-4 -->

            <div class="col-md-4 wow fadeInRight" data-wow-duration="1.5s">
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='flower' value='Flower'> Flower </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='beautyParlour' value='Beauty Parlour'> Beauty Parlour </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='photography' value='Photography'> Photography </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='exhibition' value='Exhibition'> Exhibition </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='soundSystem' value='Sound System'> Sound System </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='concert' value='Concert'> HD Projector </label>
                </div>
            </div> <!-- end col-md-4 -->

            <div class="col-md-4 wow fadeInRight" data-wow-duration="2s">
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='wifi' value='Wifi'> Wifi </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='security' value='Air Condition'> Air Condition </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='parking' value='Parking'> Parking </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='electric' value='Generator'> Power / Generator 24x7 </label>
                </div>
                <div class='checkbox wow bounce'>
                    <label> <input type='checkbox' name='transportation' value='Transportation Service'> Transportation Service </label>
                </div>
            </div> <!-- end col-md-4 -->

            <div class="col-md-12">
                <label for="serviceMessage"> Enter your other service into the below box: </label>
                <textarea name="serviceMessage" class='form-control' rows='5' placeholder='Enter your message' id="serviceMessage"></textarea>
                <input type="reset" value="Reset" class="btn btn-danger btn-lg">
                <input type="submit" value="Submit" class="btn btn-success btn-lg ">
            </div>

        </div> <!-- end row -->

    </form>

</div>


<?php include_once('../../footer.php') ?>
