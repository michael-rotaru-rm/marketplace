 <div class="inline-flex">
     <div x-data="{
         open: false,
         toggle() {
             if (this.open) {
                 return this.close()
             }
     
             this.$refs.button.focus()
     
             this.open = true
         },
         close(focusAfter) {
             if (!this.open) return
     
             this.open = false
     
             focusAfter && focusAfter.focus()
         }
     }" x-on:keydown.escape.prevent.stop="close($refs.button)"
         x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
         class="relative mr-2">
         <!-- Button -->
         <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
             type="button" class="bg-white px-5 py-2.5 rounded-md shadow text-sm ">
             @if (!empty($curentCategory->name))
                 <span>{{ $curentCategory->name }}</span>
             @else
                 <span>Category</span>
             @endif
             <span aria-hidden="true">&darr;</span>
         </button>

         <!-- Panel -->
         <ul x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
             :id="$id('dropdown-button')" style="display: none;"
             class="absolute left-0 mt-2 w-40 bg-white rounded shadow-md overflow-hidden ">
             @foreach ($categories as $category)
                 <li wire:click="updateSubcategories({{ $category->id }})" class="cursor-pointer">
                     <span class="block w-full px-4 py-2 text-left text-sm hover:bg-blue-700 hover:text-white">
                         {{ $category->name }}
                     </span>
                 </li>
             @endforeach
         </ul>
     </div>


     @if (sizeof($subcategories))
         <div x-data="{
             open: false,
             toggle() {
                 if (this.open) {
                     return this.close()
                 }
         
                 this.$refs.button.focus()
         
                 this.open = true
             },
             close(focusAfter) {
                 if (!this.open) return
         
                 this.open = false
         
                 focusAfter && focusAfter.focus()
             }
         }" x-on:keydown.escape.prevent.stop="close($refs.button)"
             x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
             class="relative">
             <!-- Button -->
             <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
                 type="button" class="bg-white px-5 py-2.5 rounded-md shadow text-sm ">
                 @if (request('subcategory'))
                     <span>{{ request('subcategory') }}</span>
                 @else
                     <span>Subategory</span>
                 @endif
                 <span aria-hidden="true">&darr;</span>
             </button>

             <!-- Panel -->
             <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
                 :id="$id('dropdown-button')" style="display: none;"
                 class="absolute left-0 mt-2 w-40 bg-white rounded shadow-md overflow-hidden ">
                 @foreach ($subcategories as $subcategory)
                     <div>
                         <a href="/?subcategory={{ $subcategory->slug }}&{{ http_build_query(request()->except('subcategory')) }}"
                             class="block w-full px-4 py-2 text-left text-sm hover:bg-blue-700 hover:text-white">
                             {{ $subcategory->name }}
                         </a>
                     </div>
                 @endforeach

             </div>
         </div>
     @endif
 </div>
