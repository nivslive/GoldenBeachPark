

/** 

// Initialize the plugin
const demoScrollBar = document.querySelector('#scroll-bar');
const psScrollBar = new PerfectScrollbar(demoScrollBar);

// Handle size change
document.querySelector('#resize').addEventListener('click', () => {

  // Get updated values
  width = document.querySelector('#width').value;
  height = document.querySelector('#height').value;
  
  // Set demo sizes
  demoScrollBar.style.width = `${width}px`;
  demoScrollBar.style.height = `${height}px`;
  
  // Update Perfect Scrollbar
  psScrollBar.update();
});**/