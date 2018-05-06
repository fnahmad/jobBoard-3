export default {
  methods: {
    async _$delete ({id}) {
      await this.$swal({
          title: 'Are you sure?',
          text: 'You can\'t revert your action',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes Delete it!',
          cancelButtonText: 'No, Keep it!',
          showCloseButton: true,
          showLoaderOnConfirm: true
        })
        .then(async (result) => {
          if(result.value) {
            await axios.delete(`/api/${this.namespace}/${id}`)
            this.$swal('Deleted', 'You successfully deleted this file', 'success')
          }
        }) 
    },
    async _$edit (payload) {
      await axios.patch(`/api/${this.namespace}`, payload)
    },
    async _$fetch ({id}) {
      await axios.get(`/api/${this.namespace}/${id}`)
    },
    async _$editHelper (data) {
      this.$modal.show(`bo_${this.namespace}`, {data})
    }
  }
}