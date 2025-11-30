/* *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** ***
/////////////////   Down Load Button Function   /////////////////
*** *** *** *** *** *** *** *** *** *** *** *** *** *** *** *** */

// (function ($) {
//   'use strict';

//   $('#tm_download_btn').on('click', function () {
//     var downloadSection = $('#tm_download_section');
//     var cWidth = downloadSection.width();
//     var cHeight = downloadSection.height();
//     var topLeftMargin = 0;
//     var pdfWidth = cWidth + topLeftMargin * 2;
//     var pdfHeight = pdfWidth * 1.5 + topLeftMargin * 2;
//     var canvasImageWidth = cWidth;
//     var canvasImageHeight = cHeight;
//     var totalPDFPages = Math.ceil(cHeight / pdfHeight) - 1;

//     html2canvas(downloadSection[0], { allowTaint: true }).then(function (
//       canvas
//     ) {
//       canvas.getContext('2d');
//       var imgData = canvas.toDataURL('image/png', 1.0);
//       var pdf = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);
//       pdf.addImage(
//         imgData,
//         'PNG',
//         topLeftMargin,
//         topLeftMargin,
//         canvasImageWidth,
//         canvasImageHeight
//       );
//       for (var i = 1; i <= totalPDFPages; i++) {
//         pdf.addPage(pdfWidth, pdfHeight);
//         pdf.addImage(
//           imgData,
//           'PNG',
//           topLeftMargin,
//           -(pdfHeight * i) + topLeftMargin * 0,
//           canvasImageWidth,
//           canvasImageHeight
//         );
//       }
//       pdf.save('download.pdf');
//     });
//   });

// })(jQuery);


(function ($) {
  'use strict';

  $('#tm_download_btn').on('click', function () {
    const downloadSection = $('#tm_download_section')[0];

    html2canvas(downloadSection, {
      scale: 3, // sharper canvas = clearer text
      useCORS: true,
      allowTaint: true
    }).then(function (canvas) {
      // JPEG at 0.9 quality for better clarity
      const imgData = canvas.toDataURL('image/jpeg', 1.0);
      const pdf = new jsPDF('p', 'mm', 'a4');

      const pageWidth = pdf.internal.pageSize.getWidth
        ? pdf.internal.pageSize.getWidth()
        : pdf.internal.pageSize.width;
      const pageHeight = pdf.internal.pageSize.getHeight
        ? pdf.internal.pageSize.getHeight()
        : pdf.internal.pageSize.height;

      const imgWidth = pageWidth;
      const imgHeight = (canvas.height * imgWidth) / canvas.width;

      let position = 0;
      let heightLeft = imgHeight;

      pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight, '', 'FAST');
      heightLeft -= pageHeight;

      while (heightLeft > 0) {
        position = heightLeft - imgHeight;
        pdf.addPage();
        pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight, '', 'FAST');
        heightLeft -= pageHeight;
      }
      // Generate dynamic filename
      const invoiceNumber = $('.tm_invoice_number b').text().replace('#', '').trim() || 'unknown';
      const now = new Date();
      const timestamp = now.toISOString().slice(0, 19).replace(/[-:T]/g, '');
      const fileName = `invoice_${invoiceNumber}_${timestamp}.pdf`;

      //Convert PDF to Blob
      const pdfBlob = pdf.output('blob');

      //Create FormData
      const formData = new FormData();
      formData.append('invoice_pdf', pdfBlob, fileName);
      formData.append('file_name', fileName);

      //Send to PHP controller
      $.ajax({
        url: BASE_URL + 'save_pdf',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
        },
        error: function (xhr, status, error) {
        }
      });
      //download as pdf
      pdf.save(fileName);
    });
  });
})(jQuery);


