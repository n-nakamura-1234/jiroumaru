jQuery(document).ready(function($) {
	console.log("jQuery ready");
	var holidays = [];
	var disabledTuesdays = [];
	
	// Holidays JP APIから祝日を取得
	$.getJSON(jiromaruData.holidaysApiUrl, function(data) {
		// 日付のフォーマットを統一（YYYY-MM-DD形式）
		Object.keys(data).forEach(function(dateStr) {
			var date = new Date(dateStr);
			var formattedDate = date.getFullYear() + '-' + 
							   ('0' + (date.getMonth() + 1)).slice(-2) + '-' + 
							   ('0' + date.getDate()).slice(-2);
			holidays[formattedDate] = data[dateStr];
			
			if (date.getDay() === 1) {
				var nextDay = new Date(date);
				nextDay.setDate(date.getDate() + 1);
				var nextFormattedDate = nextDay.getFullYear() + '-' + 
									  ('0' + (nextDay.getMonth() + 1)).slice(-2) + '-' + 
									  ('0' + nextDay.getDate()).slice(-2);
				disabledTuesdays.push(nextFormattedDate);
			}
		});
	});
	
	// 日本語の月名と曜日を設定
	$.datepicker.regional['ja'] = {
		closeText: '閉じる',
		prevText: '前',
		nextText: '次',
		currentText: '今日',
		monthNames: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		monthNamesShort: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		dayNames: ['日曜日','月曜日','火曜日','水曜日','木曜日','金曜日','土曜日'],
		dayNamesShort: ['日','月','火','水','木','金','土'],
		dayNamesMin: ['日','月','火','水','木','金','土'],
		weekHeader: '週',
		dateFormat: 'yy/mm/dd',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: true,
		yearSuffix: '年'
	};
	$.datepicker.setDefaults($.datepicker.regional['ja']);
	
	$('input[type="text"][id="date"]').datepicker({
		dateFormat: 'yy/mm/dd',
		minDate: 3,
		beforeShowDay: function (date) {
			var formattedDate = date.getFullYear() + '-' + 
							  ('0' + (date.getMonth() + 1)).slice(-2) + '-' + 
							  ('0' + date.getDate()).slice(-2);
			var dayOfWeek = date.getDay();
			
			// 祝日チェックを最初に行う
			if (holidays[formattedDate]) {
				return [true, 'holiday'];
			}
			
			// 月曜日が祝日でない場合は選択不可
			if (dayOfWeek === 1) {
				return [false, 'ui-state-disabled'];
			}
			
			// 月曜日が祝日の次の火曜日は選択不可
			if (dayOfWeek === 2 && disabledTuesdays.indexOf(formattedDate) !== -1) {
				return [false, 'ui-state-disabled'];
			}
			
			// 日曜日と土曜日のスタイル設定
			if (dayOfWeek === 0) {
				return [true, 'sunday'];
			} else if (dayOfWeek === 6) {
				return [true, 'saturday'];
			}
			
			return [true, ''];
		}
	});
	
	// datepickerが正しく初期化されたか確認
	console.log("Datepicker initialized:", $('input[type="text"][id="date"]').datepicker("option", "disabled") === false);
});