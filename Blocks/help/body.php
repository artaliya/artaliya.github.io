<div class="helpBody">
    <div class="cont hbInner">
        <div class="hbiHeader headerSmall">Frequently Asked Questions</div>
        
        <!-- Codepen __ https://codepen.io/sheryar-butt/pen/VwmpJPY -->
        <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
        <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>

        <div class="faqs-container" itemscope itemtype="https://schema.org/FAQPage">
  
        <div class="faq-singular" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <h2 class="faq-question" itemprop="name">Can I cancel my booking?</h2>
            <div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
            <div itemprop="text">
            Yes – any cancellation fees are determined by the property and listed in your cancellation policy. You'll pay any additional costs to the property.
            </div>
            </div>
        </div>
        
        <div class="faq-singular" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <h2 class="faq-question" itemprop="name">Can I pay with a deposit, or prepayment?</h2>
            <div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
            <div itemprop="text">
            Some of our properties require a prepayment (i.e. a deposit) before you stay. This prepayment consist of the total cost of the booking or just part of it. The rest is paid when you stay at the property.
However, for some properties, there is no deposit required. You pay the amount in full when you stay at the property. Be sure to check the payment policies in your confirmation for more details.
            </div>
        </div>
        </div>
        
        <div class="faq-singular" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
        <h2 class="faq-question" itemprop="name">What does the price include?</h2>
        <div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
            <div itemprop="text">
            All the facilities listed under the room or accommodation type are included in the price. You can also see if other things like breakfast, taxes, or service charges are included when you compare different options to book. After you book, this info can also be found in your confirmation email and in your bookings in your account.
            </div>
        </div>
        </div>
        
        <div class="faq-singular" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
        <h2 class="faq-question" itemprop="name">How do I know if parking is available at the property and how can I reserve it?</h2>
        <div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
            <div itemprop="text">
            You can see if the property has parking under "Facilities" before making a booking. If the property requires you to reserve a space, contact them directly with the contact details provided in your booking confirmation.
            </div>
        </div>
        </div>
        
        </div>


        <script>
            $(document).ready(function() {
  $(".faqs-container .faq-singular:first-child").addClass("active").children(".faq-answer").slideDown();//Remove this line if you dont want the first item to be opened automatically.
  $(".faq-question").on("click", function(){
    if( $(this).parent().hasClass("active") ){
      $(this).next().slideUp();
      $(this).parent().removeClass("active");
    }
    else{
      $(".faq-answer").slideUp();
      $(".faq-singular").removeClass("active");
      $(this).parent().addClass("active");
      $(this).next().slideDown();
    }
  });
});
        </script>
        <!-- Codepen -->
    </div>
</div>