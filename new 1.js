         
// focusear  y mandar clave

		 [DllImport("user32.dll")]
        public static extern bool SetForegroundWindow(IntPtr hWnd);

		  Process[] arrProcesses = Process.GetProcessesByName("PathOfExile_x64Steam");

            if (arrProcesses.Length > 0)
            {

                IntPtr ipHwnd = arrProcesses[0].MainWindowHandle;
                System.Threading.Thread.Sleep(100);
                SetForegroundWindow(ipHwnd);

            }

			
			SendKeys.SendWait("q");
			
			
			// limpiar trash
			
			           GC.Collect();
            GC.WaitForPendingFinalizers();
            GC.Collect();