<!DOCTYPE html>
<html>
<head>
  <title>Augmented Reality</title>
  <script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
  <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/2.1.7/aframe/build/aframe-ar.js"></script>
</head>
<body style="margin: 0; overflow: hidden;">
  <a-scene embedded arjs="sourceType: webcam; debugUIEnabled: false;">
    <!-- Marker for tracking -->
    <a-marker type="pattern" url="{{asset('/images/pattern-bio.patt')}}" emitevents="true" id="marker">
      <!-- Plane to display the image -->
      <a-plane id="imagePlane" position="4 0 0" rotation="-90 0 0" width="4" height="2.25" material="shader: flat; scale: 2 2 2"></a-plane>
    </a-marker>
    <!-- Camera to view the scene -->
    <a-entity camera></a-entity>
  </a-scene>
  <!-- Script to refresh every 5 seconds -->
  <script>
    const imagePlane = document.getElementById("imagePlane");
    const marker = document.getElementById("marker");

    // const imageUrl = "kevs.jpg";
    const imageUrl = "{{asset('/images/'biodegradable-sample.jpg)}}";
    let isAnimationRunning = false; // To prevent multiple animations

    marker.addEventListener("markerFound", () => {
      if (!isAnimationRunning) {
        animatePosition(4, 0, 0, 1000); // Animates from (0, 0, 0) to (4, 0, 0) in 1 second
      }
    });

    marker.addEventListener("markerLost", () => {
      if (!isAnimationRunning) {
        animatePosition(4, 0, 0, 1000); // Animates from (4, 0, 0) to (0, 0, 0) in 1 second
      }
    });

    function animatePosition(startX, endX, endY, duration) {
      isAnimationRunning = true;
      const startTime = performance.now();
      const startY = 0;

      function updatePosition(currentTime) {
        const elapsedTime = currentTime - startTime;
        if (elapsedTime < duration) {
          const newX = startX + (endX - startX) * (elapsedTime / duration);
          const newY = startY + (endY - startY) * (elapsedTime / duration);
          imagePlane.setAttribute("position", `${newX} ${newY} 0`);
          requestAnimationFrame(updatePosition);
        } else {
          imagePlane.setAttribute("position", `${endX} ${endY} 0`);
          isAnimationRunning = false;
        }
      }

      requestAnimationFrame(updatePosition);
    }

    // Function to update the image source
    function updateImageSource() {
      const uniqueParam = Date.now(); // Generate a unique parameter
      const newImageUrl = `${imageUrl}?v=${uniqueParam}`;
      imagePlane.setAttribute("material", "src", newImageUrl);
    }
    // Initial image update
    updateImageSource();
    // Check for image update every 5 seconds
    setInterval(updateImageSource, 5000);
  </script>
</body>
</html>
