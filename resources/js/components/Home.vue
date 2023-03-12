<template>
    <div>
      <h1 class="text-warning">Welcome to Laravue Project!</h1>
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        {{ devName }}
                    </div>
                </div>
            </div>
        </div>
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
