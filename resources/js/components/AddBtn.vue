<template>
  <div>
    <div class="form-group mb-3" v-for="(input, index) in inputs" :key="index">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <span class="fas fa-prescription-bottle"></span>
          </div>
        </div>
        <input type="text" class="form-control" name="medicine[]" autofocus placeholder="List of Medicines" required>
      </div>
      <div class="row mt-2 mb-0">
        <div class="col-12">
          <a class="btn btn-sm bg-gradient-primary border-radius-2" @click.prevent="add(index)" v-show="index == inputs.length-1">Add More Medicine</a>
          <a class="btn btn-sm bg-gradient-danger border-radius-2" @click.prevent="remove(index)" v-show="index || (!index && inputs.length > 1)">Remove</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
  export default {
    data() {
      return {
        inputs: [{}]
      }
    },
    methods: {
      add() {
        this.inputs.push({
          medicine: ''
        })
      },
      remove(index) {
        this.inputs.splice(index, 1)
      }
    }
  }
</script>