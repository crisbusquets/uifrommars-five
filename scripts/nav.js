var container = document.querySelector(".nav-container");
var button = document.querySelector("button");

button.addEventListener("click", () => {
  /** Slide down. */
  if (!container.classList.contains("active")) {
    /** Show the container. */
    container.classList.add("active");
    container.style.height = "auto";

    /** Get the computed height of the container. */
    var height = container.clientHeight + "px";

    /** Set the height of the content as 0px, */
    /** so we can trigger the slide down animation. */
    container.style.height = "0px";

    /** Do this after the 0px has applied. */
    /** It's like a delay or something. MAGIC! */
    setTimeout(() => {
      container.style.height = height;
    }, 0);

    /** Slide up. */
  } else {
    /** Set the height as 0px to trigger the slide up animation. */
    container.style.height = "0px";

    /** Remove the `active` class when the animation ends. */
    container.addEventListener(
      "transitionend",
      () => {
        container.classList.remove("active");
      },
      { once: true }
    );
  }
});
