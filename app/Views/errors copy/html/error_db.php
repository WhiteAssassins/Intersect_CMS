
<style>
	/** SCSS function to return a colour from a list, in hexidecimal or rgba value
 * @param name: key used in the $colors list associated with a hexadecimal colour
 * @param opacity: opacity value [0, 100] to be used by the rgba() colour; hex (default) to get the solid colour in hexadecimal value
**/
* {
  box-sizing: border-box;
}

html,
body {
  height: 100%;
  font-size: 16px;
  font-family: Helvetica, Arial, sans-serif, system-ui;
}

body {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  margin: 0;
  color: #e6e6e6;
  background: #0b5d59 radial-gradient(circle at center, #66003b 0%, #65003b 8.1%, #62013a 15.5%, #5e0238 22.5%, #580435 29%, #510632 35.3%, #4a082f 41.2%, #420a2b 47.1%, #3b0d27 52.9%, #330f24 58.8%, #2b1120 64.7%, #25131d 71%, #1f151b 77.5%, #1b1619 84.5%, #181717 91.9%, #171717 100%);
}

h1 {
  --distance: 0.01em;
  --dist-factor: 1;
  position: relative;
  display: block;
  margin: 0;
  font-size: 15vmax;
  font-weight: normal;
  font-family: monospace;
  line-height: 1;
  color: #db73b0;
  filter: saturate(150%);
}
h1 > [data-overlay] {
  position: relative;
}
h1 > [data-overlay]::after {
  --dist-factor: 32;
  content: attr(data-overlay);
  position: absolute;
  left: 0;
  top: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  color: #ffd200;
  font-size: 0.125em;
}
h1, h1::after,
h1 [data-overlay]::after {
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-animation: animText 3s linear infinite;
          animation: animText 3s linear infinite;
}
h1::after {
  --dist-factor: 2;
  content: attr(data-txt);
  position: absolute;
  left: 0;
  top: 0;
  color: #73c5c1;
  mix-blend-mode: screen;
}
h1::after,
h1 [data-overlay]:first-child::after {
  animation-direction: reverse;
}

p {
  position: relative;
  color: #e6e6e6;
  text-align: center;
}

@-webkit-keyframes animText {
  0% {
    transform: rotate(0deg) translate(calc(var(--distance) * -1 * var(--dist-factor)), calc(var(--distance) * -1 * var(--dist-factor))) rotate(0deg);
  }
  100% {
    transform: rotate(360deg) translate(calc(var(--distance) * -1 * var(--dist-factor)), calc(var(--distance) * -1 * var(--dist-factor))) rotate(-360deg);
  }
}

@keyframes animText {
  0% {
    transform: rotate(0deg) translate(calc(var(--distance) * -1 * var(--dist-factor)), calc(var(--distance) * -1 * var(--dist-factor))) rotate(0deg);
  }
  100% {
    transform: rotate(360deg) translate(calc(var(--distance) * -1 * var(--dist-factor)), calc(var(--distance) * -1 * var(--dist-factor))) rotate(-360deg);
  }
}
.titanic {
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 0.1725em;
  font-size: 50vmax;
  transform-origin: 33.3% 100%;
  transform: rotate(30deg);
}
.titanic::before, .titanic::after {
  content: "";
  margin: 0 auto;
}
.titanic::before {
  position: absolute;
  left: 0.125em;
  right: 0.5em;
  bottom: 100%;
  width: 0.1em;
  height: 0.25em;
  border-radius: 0.0125em;
  background: #161616;
  box-shadow: 0.25em 0 0 #161616, 0.5em 0 0 #161616;
}
.titanic::after {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  width: 1em;
  height: 0.25em;
  background: linear-gradient(to bottom, #7e7e7e 19.5%, #730b0b 20.5%, #730b0b 79.5%, #161616 80.5%);
  -webkit-clip-path: polygon(0 0, 100% 0, calc(100% - 0.025em) 0.05em, calc(100% - 0.1em) 100%, 0.1em 100%, 0.025em 0.05em);
          clip-path: polygon(0 0, 100% 0, calc(100% - 0.025em) 0.05em, calc(100% - 0.1em) 100%, 0.1em 100%, 0.025em 0.05em);
}
</style>
<div class="titanic"></div>

<h1 data-txt="ERROR DB" aria-label="Internal Server Error">ERROR DB</h1>
<p><?php echo $message; ?>.</p>


		
