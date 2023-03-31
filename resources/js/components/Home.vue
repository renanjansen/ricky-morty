<template>
    <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        {{ devName }}
                    </div>
                </div>
  </template>

  <script>
  export default {
    setup: () => ({
      devName: "Renan Jansen",
    }),
  };
  </script>
