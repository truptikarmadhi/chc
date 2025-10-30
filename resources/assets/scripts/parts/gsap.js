import gsap from "gsap";
import { ScrollTrigger } from "gsap/all";

export class Gsap {
    init() {
        this.HeroSection();
    }
    HeroSection() {
        gsap.registerPlugin(ScrollTrigger);

        const heroSection = document.querySelector(".hero-section");
        const heroImg = document.querySelector(".hero-img");

        if (heroSection && heroImg) {
            gsap.fromTo(heroImg,
                {
                    maxWidth: "1166px",
                },
                {
                    width: "100%",
                    maxWidth: "100%",
                    ease: "power2.inOut",
                    scrollTrigger: {
                        trigger: heroSection,
                        start: "top-=75% top",
                        end: "bottom top",
                        scrub: true,
                        markers: true,
                    }
                }
            );
        }

    }
}