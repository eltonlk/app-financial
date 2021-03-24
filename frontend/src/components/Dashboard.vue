<template>
    <div class="container">
      <nav class="grey lighten-4 black-text">
          <div class="container">
              <div class="nav-wrapper">
                  <h4 class="left">Dashboard</h4>
              </div>
          </div>
      </nav>
    </div>
</template>

<script type="text/javascript">
    import Auth from "../services/auth";
    export default {
        ready () {
            console.log(Auth.user.data);
        }
    }
</script>
