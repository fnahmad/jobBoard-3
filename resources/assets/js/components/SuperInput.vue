<script>
import Datepicker from 'vuejs-datepicker'
export default {
  name: 'SuperInput',
  props: {
    type: {
      type: String,
      default: 'text'
    },
    value: {
      type: [String, Date, Number],
      default: ''
    },
    placeholder: {
      type: String,
      default: 'aaa'
    },
    error: {
      type: [Boolean, String],
      default: false
    },
    bold: {
      type: Boolean,
      default: true
    }
  },
  components: { Datepicker },
  methods: {
    sync(value) {
      this.$emit('input', value)
    }
  },
  computed: {
    showError (h) {
      return this.error
        ?  <div class="Form-group-error">{this.error}</div>
        : null
    },
    tag (h) {
      function getTag (type) {
        switch (type) {
          case 'textarea': return ('textarea')
          default: return ('input')
        }
      }
      return function (h) {
        if (this.type === 'date') {
          return (<datepicker type={this.type} value={this.value} placeholder={this.placeholder} on-input={e => this.sync(e.toISOString().split('T')[0])} />)
        }
        return this.$createElement(
          getTag(this.type),
          {
            domProps: {
              value: this.value
            },
            attrs: {
              type: this.type,
              value: this.value,
              placeholder: this.placeholder
            },
            on: {
              input: e => this.sync(e.target.value)
            }
          }
        )
      }
    }
  },

  render (h) {
   	return (
      <div class="">  
  	   	<label class={ !this.bold ? '' : '' }>
  	   		{this.$slots.default}
        </label>
          <div class="Input"> { this.tag(h) } </div>
        {this.showError}
      </div>
    )
  }
}
</script>

<style lang="scss">
$cool-gray: #bdbdc5;
$dark-gray: #7C7C8B;
$medium-gray: #BDBDC5;
$regular-gray:#DEDEE2;
$light-gray:#EEEEF0;
$very-light-gray:#F6F6F7;
$light-blue:#EBF8FE;
$very-light-blue:#F8FCFC;


$dark: #24253d;
$blue: #388FFF;
$turquoise: #3CECD8;
$red: #E05970;
$darkred: #a60027;
$lightred: #fc5c65;
$green: #7FEBA4;
$yellow:#FFEA3B;

// $brand-primary:         darken(#428bca, 6.5%) // #337ab7
// $brand-success:         #5cb85c
// $brand-info:            #5bc0de
// $brand-warning:         #f0ad4e
// $brand-danger:          #d9534f

$spacement: 12px;

//== Scaffolding
//
//## Settings for some of the most global styles.

//** Background color for `<body>`.
// $body-bg:               #fff
$content-bg: #fafafb;
//** Global text color on `<body>`.
// $text-color:            $gray-dark

//** Global textual link color.
// $link-color:            $brand-primary
//** Link hover color set via `darken()` function.
// $link-hover-color:      darken($link-color, 15%)
//** Link hover decoration.
// $link-hover-decoration: underline


//== Typography
//
//## Font, line-height, and color for body text, headings, and more.

$font-family-sans-serif:  'Inter UI', sans-serif;
// $font-family-serif:       Georgia, "Times New Roman", Times, serif
//** Default monospace fonts for `<code>`, `<kbd>`, and `<pre>`.
// $font-family-monospace:   Menlo, Monaco, Consolas, "Courier New", monospace
$font-family-base:        $font-family-sans-serif;
  .Input{

	input, textarea, select{
		border-radius: 8px;
		background-color: #ffffff;
		border: solid 1px $regular-gray;
	  	box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.03);
		padding: 6px;
		font-size:16px;
		display: block;
		width: 100%;

		outline: none;
		&:focus, &:active{
			border-color: rgba($blue, 0.7);
			box-shadow: 0 2px 2px 0 rgba(56, 142, 255, 0.15);
		}
	}

	&.has-error{
		textarea, input{
			border-color: $lightred;
		}
	}

	input, select{
		height: 48px;
	}

	textarea{
		min-height:200px;
		width:100%;
	}

	select{
		padding: 0 16px;
		display: inline-block;
		-webkit-appearance: none;
	}

	&.has-chevron{
		position: relative;
		&:after{
			position: absolute;
			right: 0;
			top: 0;
			content: '▼';
			font-size: 9px;
			height: 9px;
			bottom: 0;
			right: 16px;
			margin: auto;
			color: black;
			display: block;
		}
		select{
			padding-right: 64px;
		}
	}

	*::placeholder{
		font-size: 16px;
		font-weight: 100;
		line-height: 1.5;
		text-align: left;
		color: $regular-gray;
	}

	// Custom Checkbox
	&-checkbox{
		display:none;
		&-label{
			&:before{
				content: "";
				transition:all 0.3s ease;
				padding: 0px 7px 0px;
				border-radius: 2px;
				background-color: $very-light-gray;
				border: solid 1px $regular-gray;
				margin-right:16px;
				font-size:11px;
			}
		}
		&-shape{
			width: 8px;
   			height: 5px;
			position:absolute;
			border-bottom: solid 2px $blue;
			border-left: solid 2px $blue;
			top: 20px;
			left: 16px;
			opacity:0;
			transform:rotate(-45deg);
			transition:all 0.3s ease;
		}
	}

	&-checkbox:checked + label{
		color:$blue;
		&:before{
			background-color: $light-blue;
			border: solid 1px ;
			transition:all 0.3s ease;
		}
		& > .Input-checkbox-shape{
			opacity:1;
			transition:all 0.3s ease;
		}
	}

	// Custom Radio
	&-radio{
		display:none;
		&-label{
			&:before{
				content: "";
				transition:all 0.3s ease;
				padding: 0px 7px 0px;
				background-color: $very-light-gray;
				border: solid 1px $regular-gray;
				margin-right:16px;
				font-size:11px;
				border-radius: 50%;
			}
		}
		&-shape{
			width: 8px;
			height: 8px;
			position:absolute;
			border: solid 2px $blue;
			border-radius:50%;    
			top: 19px;left: 16px;
			opacity:0;
			transition:all 0.3s ease;
			background-color:$blue;
		}
	}

	&-radio:checked + label{
		color:$blue;
		&:before{
			background-color: $light-blue;
			border: solid 1px $blue;
			transition:all 0.3s ease;
		}
		& > .Input-radio-shape{
			opacity:1;
			transition:all 0.3s ease;
		}
	}


	&-control{ // TODO doit être un label ?
		width: 100%;
		height: 48px;
		-webkit-appearance: none;
		border: none;
		outline: none;
		background: transparent;
		padding: 0 16px;
	}

	&-base{
		&-title{
			margin:0;
			font-size: 16px;
			line-height: 2;
			text-align: left;
			color: $dark;
			font-weight:400;
		}
		&-textarea{
			border-radius: 8px;
			background-color: white;
			border: solid 1px $regular-gray;
		  	box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.03);
			padding: 12px;
			display: block;
			width: 100%;
			min-height:200px;
			outline: none;
		}
		&--select{
		    background-color: white;
		    //margin-bottom:16px;
		}
		&-items{
			border-radius: 8px;
			background-color: #ffffff;
			box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.03);
			border: solid 1px $regular-gray;
		}
		&-item{
			border-bottom: solid 1px $light-gray;
			position:relative;
			padding: 0 12px;
			&-label{
				font-weight:300;
				font-size:16px;
				line-height:24px;
				color: $dark-gray;
				padding-top:10px;
				padding-bottom:10px;
				margin-bottom:0;
				cursor:pointer;
				width: 100%;
			}
			&:last-child(){
				border:0;
				padding-bottom:1px;
			}
		}
		&-instructions{
			width:100%;
			border-radius:0 0 8px 8px;
			border: solid 1px $regular-gray;
			background-color: $very-light-blue;
			box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.03);
			padding: 8px 12px;
			font-size: 14px;
			line-height: 2.0;
			text-align: right;
			color: $cool-gray;
			margin-top: -5px;
    		z-index: 1;
		}
	}
	&-margin{
		margin-bottom:11px;
		font-size:16px;
	}
	
	
	
	
}

</style>