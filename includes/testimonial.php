<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="text-primary text-uppercase">// Testimonial //</h6>
            <h1 class="mb-5">Our Clients Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <?php
                $query=mysqli_query($con,"SELECT * from feedback") or die(mysqli_error($con));
                if(mysqli_num_rows($query)){
                    while($row=mysqli_fetch_array($query)){
            ?>
            <div class="testimonial-item text-center">
                <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0"><?php echo $row['feedback_from']; ?></h5>
                <p><?php echo $row['feedback_subject']; ?></p>
                <div class="testimonial-text bg-light text-center p-4">
                <p class="mb-0"><?php echo $row['feedback_message']; ?></p>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>