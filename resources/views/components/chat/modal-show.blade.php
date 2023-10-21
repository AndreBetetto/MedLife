<div class="fixed bottom-[50px] right-[60px]">
    <x:chat.modal-btn class="align-middle"></x:modal-btn>
</div>

<div
  data-te-modal-init
  class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none backdrop-blur-[2px] shadow-md"
  id="chatbtn"
  tabindex="-1"
  aria-labelledby="chatbtn"
  aria-modal="true"
  role="dialog">
  <div
    data-te-modal-dialog-ref
    class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:my-14 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[1366px]">
    <div
      class="pointer-events-auto p-5 relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-slate-800">
      <div
      class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
      <!--Modal title-->
      <h5
        class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
        id="exampleModalScrollableLabel">
        Chat MedLife
      </h5>
      <!--Close button-->
      <button
        type="button"
        class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
        data-te-modal-dismiss
        aria-label="Close">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="h-6 w-6">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

      <!--Modal body-->
      <div class="relative p-4 w-10/12 m-auto">
          @livewire('chat-component')
      </div>
    </div>
  </div>
</div>