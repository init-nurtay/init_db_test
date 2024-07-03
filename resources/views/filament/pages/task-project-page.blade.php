<div>
{{--       <x-filament-panels::page>--}}

{{--       </x-filament-panels::page>--}}

<x-filament-panels::page>
<style>
       body {
              font-family: Arial, sans-serif;
              background-color: #f9f9f9;
              margin: 0;
              padding: 0;
              display: flex;
              flex-direction: column;
              align-items: center;
       }

       .header {
              width: 100%;
              display: flex;
              justify-content: flex-end;
              padding: 10px 20px;
              background-color: #fff;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
       }

       .tabs {
              display: flex;
              gap: 10px;
       }

       .tab {
              border: none;
              background-color: #e0e0e0;
              padding: 10px 20px;
              cursor: pointer;
              border-radius: 5px;
       }

       .tab.active {
              background-color: #fff;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
       }

       .container {
              display: flex;
              justify-content: space-around;
              width: 100%;
              max-width: 1200px;
              padding: 20px;
              box-sizing: border-box;
       }

       .column {
              background-color: #fff;
              border-radius: 10px;
              box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
              padding: 20px;
              width: 45%;
              display: flex;
              flex-direction: column;
              align-items: center;
       }

       h2 {
              margin-top: 0;
              color: #333;
       }

       .add-task {
              background-color: #007bff;
              color: #fff;
              border: none;
              padding: 10px 15px;
              border-radius: 5px;
              cursor: pointer;
              margin-bottom: 20px;
       }

       .loader {
              border: 4px solid #f3f3f3;
              border-top: 4px solid #007bff;
              border-radius: 50%;
              width: 30px;
              height: 30px;
              animation: spin 2s linear infinite;
       }

       @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
       }
</style>
<div>
       <div class="header">
              <div class="tabs">
                     <button class="tab active">Актуальные</button>
                     <button class="tab">SEO</button>
              </div>
       </div>
       <div class="container">
              <div class="column">
                     <h2>Актуальные задачи</h2>
                     <button class="add-task">+ Добавить задачу</button>
                     <div class="loader"></div>
              </div>
              <div class="column">
                     <h2>Актуальные проекты</h2>
                     <div class="loader"></div>
              </div>
       </div>
</div>
</x-filament-panels::page>

</div>



