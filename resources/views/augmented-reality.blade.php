<!DOCTYPE html>
<html>
<head>
  <title>Augmented Reality</title>
  <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
  <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/2.1.7/aframe/build/aframe-ar.js"></script>
</head>
<body style="margin: 0; overflow: hidden;">
  <a-scene embedded arjs="sourceType: webcam; debugUIEnabled: false;">
    <!-- Marker 1 for tracking -->
    <a-marker type="pattern" url="{{asset('/images/pattern-hazardous-waste.patt')}}" emitevents="true" id="marker">
      <!-- Plane to display the image -->
      <a-plane class="imagePlane" position="4 0 0" rotation="-90 0 0" width="4" height="2.25" material="shader: flat; scale: 2 2 2"></a-plane>
    </a-marker>

    <!-- Marker 2 for tracking -->
    <a-marker type="pattern" url="{{asset('/images/pattern-hiro.patt')}}" emitevents="true" id="marker1">
      <!-- Plane to display the image -->
      <a-plane class="imagePlane" position="4 0 0" rotation="-90 0 0" width="4" height="2.25" material="shader: flat; scale: 2 2 2"></a-plane>
    </a-marker>

    <!-- Marker 3 for tracking -->
    <a-marker type="pattern" url="{{asset('/images/pattern-bio.patt')}}" emitevents="true" id="marker2">
        <!-- Plane to display the image -->
        <a-plane class="imagePlane" position="4 0 0" rotation="-90 0 0" width="4" height="2.25" material="shader: flat; scale: 2 2 2"></a-plane>
    </a-marker>

    <!-- Camera to view the scene -->
    <a-entity camera></a-entity>
  </a-scene>
  <!-- Script to refresh every 5 seconds -->
  <script>
    const markers = document.querySelectorAll("[id^=marker]");
    const imagePlanes = document.querySelectorAll(".imagePlane");

    markers.forEach((marker, index) => {
      const imagePlane = imagePlanes[index];
      const imageUrl = `{{ asset('images/hazard${index + 1}.jpeg') }}`;
      let isAnimationRunning = false;

      marker.addEventListener("markerFound", () => {
        if (!isAnimationRunning) {
          animatePosition(imagePlane, 4, 0, 0, 1000);
        }
      });

      marker.addEventListener("markerLost", () => {
        if (!isAnimationRunning) {
          animatePosition(imagePlane, 4, 0, 0, 1000);
        }
      });

      function animatePosition(element, startX, endX, endY, duration) {
        isAnimationRunning = true;
        const startTime = performance.now();
        const startY = 0;

        function updatePosition(currentTime) {
          const elapsedTime = currentTime - startTime;
          if (elapsedTime < duration) {
            const newX = startX + (endX - startX) * (elapsedTime / duration);
            const newY = startY + (endY - startY) * (elapsedTime / duration);
            element.setAttribute("position", `${newX} ${newY} 0`);
            requestAnimationFrame(updatePosition);
          } else {
            element.setAttribute("position", `${endX} ${endY} 0`);
            isAnimationRunning = false;
          }
        }

        requestAnimationFrame(updatePosition);
      }

      function updateImageSource() {
        const uniqueParam = Date.now();
        const newImageUrl = `${imageUrl}?v=${uniqueParam}`;
        imagePlane.setAttribute("material", "src", newImageUrl);
      }

      updateImageSource();
      setInterval(updateImageSource, 5000);
    });
  </script>
</body>
</html>
