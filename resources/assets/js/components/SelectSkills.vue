<template>
    <div class="form-group">
        <label>Compétences</label>
        <v-select multiple taggable v-model="selected" :options="options" :closeOnSelect="false"></v-select>
        <input type="text" v-model="selected" name="skills[]" hidden>
    </div>
</template>

<script>
	import vSelect from 'vue-select'

	export default {
		name: "SelectSkills",
		props: ['options', 'default'],
		components: {
			vSelect
		},
		data() {
			return {
				selected: []
			}
		},
		mounted() {
			this.selected = this.default;
		}
	}
</script>