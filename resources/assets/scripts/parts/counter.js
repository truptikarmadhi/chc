export class Counter {
    init() {
        this.CounterAnimation();
    }

    CounterAnimation() {
        $(document).ready(function () {
            $(".count").each(function () {
                var $this = $(this);
                var startNumber = 0;
                var targetNumber = parseInt($this.data("number"));

                var counter = setInterval(function () {
                    startNumber++;
                    $this.text(startNumber);

                    if (startNumber === targetNumber) {
                        clearInterval(counter);
                    }
                }, 50);
            });
        });

    }
}