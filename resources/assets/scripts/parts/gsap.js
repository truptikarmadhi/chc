import gsap from "gsap";
import { ScrollTrigger } from "gsap/all";

export class Gsap {
    init() {
        this.HeroSection();
    }
    HeroSection() {
        $(document).ready(function () {
            if ($('.hero-section')) {
                gsap.registerPlugin(ScrollTrigger);

                gsap.to(".hero-img", {
                    scrollTrigger: {
                        trigger: ".hero-section",
                        start: "top top",
                        end: "bottom+=100% top", // how long to scale
                        scrub: true,
                        markers: false
                    },
                    scale: 2,
                    y: -300, 
                    ease: "none"
                });
            }
        })

    }
}