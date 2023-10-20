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
        <div class="flex flex-shrink-0 flex-wrap items-center justify-end border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
          <button
            type="button"
            class="inline-block rounded bg-red-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-red-400 focus:bg-red-400 focus:outline-none focus:ring-0 active:bg-red-400"
            data-te-modal-dismiss
            data-te-ripple-init
            data-te-ripple-color="light">
            X
          </button>
        </div>
        <!--Close button-->
        <button
          type="button"
          class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
          data-te-modal-dismiss
          aria-label="Close">
        </button>
      </div>

      <!--Modal body-->
      <div class="relative p-4">
          @livewire('chat-component')
      </div>
    </div>
  </div>
</div>