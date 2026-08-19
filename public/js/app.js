const faqs = document.querySelectorAll(".faq");
const menuIcon = document.querySelector(".menuIcon");
const header = document.querySelector("header");
const menuItems = document.querySelectorAll(".menuItem");

menuItems.forEach((el) => {
    el.addEventListener("click", () => {
        menuIcon.id = "";
        header.id = "";
        document.body.style.overflow = "";
    });
});

if (menuIcon) {
    menuIcon.addEventListener("click", () => {
        if (menuIcon.id) {
            menuIcon.id = "";
            header.id = "";
            document.body.style.overflow = "";
        } else {
            menuIcon.id = "crossMenuIcon";
            header.id = "mobileHeader";
            document.body.style.overflow = "hidden";
        }
    });
}

faqs.forEach((el) => {
    el.addEventListener("click", () => {
        const isOpen = el.classList.contains("open");
        faqs.forEach((item) => item.classList.remove("open"));
        if (!isOpen) {
            el.classList.add("open");
        }
    });
});

const onScroll = () => {
    if (!header) {
        return;
    }
    header.classList.toggle("is-scrolled", window.scrollY > 12);
};

onScroll();
window.addEventListener("scroll", onScroll, { passive: true });

if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12, rootMargin: "0px 0px -8% 0px" }
    );

    document.querySelectorAll(".reveal").forEach((el, index) => {
        el.style.transitionDelay = `${(index % 6) * 70}ms`;
        observer.observe(el);
    });
} else {
    document.querySelectorAll(".reveal").forEach((el) => el.classList.add("is-visible"));
}
