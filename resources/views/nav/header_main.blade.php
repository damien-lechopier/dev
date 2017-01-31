@section('css')
	
	<style type="text/css">
		
		.header-main {
		  background: url("../../images/pictos/bg-main-{{ rand(1,3) }}.jpg") center top;
  		}
  		
  		.block-calcul div:nth-child(2) div.title-underlined:after{
			background:none;
		}
		
	</style>
	
@endsection

<header id="header">
    <div class="header-main">
        <div class="container">
             @include('nav.nav')
            <div class="header-main-holder">
                <a href="/" id="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="346" height="148" viewBox="0 0 346 148">
                        <image xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVoAAACUCAYAAADSxOEGAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAAsSAAALEgHS3X78AAAj/0lEQVR42u2de3Qb9ZXHvzN6+KX4lcTGeceGQCAkASdAKRwK2LSkLU3TOkvb3XrF2ZPgU9puKazN0qVLT1vssi1td1kTd1uv2O02J15g2YZHsYHybkiUJSQQEmKT1Hk5xJFjy7YsS5r94zcjjaQZeUaekUb2/Zyjk3g0mvnN/Ga+c+f+7r0/DgSRiNszD8B12WzCI19Zf+VfXLVsY1VJweURQQidGhrff91Dz//k6Fl/INunJ4Hz6Gx8OduNIKyNPdsNICzJKgBPZWvnJQVO/G39yujfPMfZF5YVXvGPX1jzu7/+9RvZPjeJ7AOwNtuNIKwNn+0GEEQiKy4oVlzesH4pbDyX7eYRhG5IaAnLMdeVp7i80GnH0rmubDePIHRDQktYjhWVxarfrVlclu3mEYRuSGgJy1FS4FD97tT58Ww3jyB0Q0JL5BSHTw9nuwkEoRsSWsJylBY6FZefHBrDudGJbDePIHRD4V2E5VAT2r3HzmH98nkocNhQWZIPG88hHBHgtNlQ4LRhTr4DFcX5GAlMIs9uw0hgEgDgtPMIhiIIRwScGQ7gzMg4jp4dxamhMfgnQtk+XGIWQEJLZB0bz6FiTj6WznNhcXkh1i+fq7je59YswufWLDJ03/3nRnHw1Hns/mgQbx35GN3vn0QwFMn2KSFmGCS0hOm48uxYcUExKooLsLKqBIvKCrHigmIsKitERXE+FpQWZq1ti8uLsLi8CLdctgAAc0888sJBPPbyIbJ2CcMgoSXSoqTAiTn5dgyNBaOCVOC0YWVVCVZcUIyVVaVYv3wuVlaVYNm83Il9XVBaiIc31+Kez1yGpsf/hKf2/jnbTSJmACS0RFr0//RLmJPvmP6GLEplcT6evOtTuP/J/8OPd+7PdnOIHIeiDoi0CEeEbDchIzy4cS2aN6zKdjOIHIeElkgLaUR/pmPnOfxw0xVYOrco200hchhyHRBpcdw3hsXl+sVnYDiADweGcfDkefSfG8X4ZBgPb67N9uGkxM5zeOC2NdjieWvWWPKEsZDQEmkx6FdOHPjNa0dw3DeGkgIHi1sdCeDU0Dj29Z/D4YFhjAfDAFhs600rq3DHdRem3YaTQ2MYD4ZxeGAYxwZH0XtmBENjQYQjAvwTkzg/NonRIBuoC0cEDPonEI4IKC104MxwACOBEJbNYw+La2rm47GvX6O6rzuuvxC3X70Mv33rI3zjP3dhMkwhYIR2SGiJtJAEM5Ffvfoh/tT7servyovycP/nLscd11+ompigxHP7T6D1mQMIhiM4fHrYsAyxff1BAEBFcf6U6xY67XDaeXBUqZHQCQktYSgVc9QF6+vX1uBnt69TLYOYilcODeDVwwOmtdvGaxuu2HvsHCLkPiB0QkJLGIpayNdDX74SLdMYvV+1sNTkdmu7FfrPjYJkltALCS2RFmqv2kozIDy4ca1mkR0aC+LAiSH0nhnBqfPjqCopwA0XV+L1D8+YejxOm03Tev6JSQiktIROSGiJtHDalV+1xyfj01a/fm0NHrhtdcptjQVDeGrvn/GzP7yPvcfOZeV4tE6RY+NFHy2JLaEDEloiLSo1DB5dWDEHj/7V1SnX2b7rKO7evnvKgt7V8+fgmpp5WL2oDLXL5qKqpAALSgtRVuREOCKg/9wojg2O4uUPTqNr91G8f/K8ruMJRbRFEQyNBcmiJXRDQkukRVGesi92JBCzaH/5tavgylO+xMaCIdz1n2+j8/UjqvuoKM7HN266BF+7ZjlqKuaormfjOSyb58KyeS7ccHEl/vELa/Di+6fw8+6D2LnvuKbjKXRquxXODAcgkDlL6ISElkgLNYu2wMF8nZ+5fCFuvXyh4joToTA+/4uX8NLB04rflxfl4cGNa3DnjRfDnuastzdfWoWbL62C9+ggmv5jF3Z/dDbl+nl2SpIkzIOuLkI3fIpA0vPjLC71h19cq/j90FgQG//5j6oi+626lej/6Zdw182X6BLZUETA0FgwaXntsrl48/5b8dCXr0zphy3QaNGGNboYCEIOWbSEbvId6iP0Y8Ew6i+rQu0y5eLdrc8ewPP7TyQtLyty4vG/uU5TYe+B4QC63zuJVw4N4MCJoaQEhkuqSrCpdgm+VbcSlcX5sPMcWjaswqqFpWj8tzcUkx20ptYOjc2OGg+EsZDQErpJZWgO+idw72cuU/zu6Fk//un595KWlxfloefeelyxpDzlfp/bfwK/7PkALx08lXIWhA9OncePd+7HL7oP4nufXx0NLfvcmkV48d563Pxwd9qZZeFIhAbDCN2Q64AwlNJCJz5z+QLF7+57Ym+S5ejKs+OF79alFNnn9p/AJ370HDY88iKe339C81QzoxMh3Pffe/Ht/9odXbZ2STme/taNSW4EtUG7RGjWBSIdSGgJ3dht6pdNw/qliiP4h08PY/uuo3HLbDyHJ+76lKqbYSQwicZ/ewMbHnkxZf2Eqfhlz0H86pUPo39fd1EF7kmwurXWXagqKaBaB4RuSGgJ3ThSCO2mK5coLm999kDSsr//7OXRuboSGR3z43uPPYqndh2AEXz7d2/j6Fl/9O8HN65B9fw5urczNE5xtIR+SGgJ3aQavVeKdz05NIbH3+yNW3ZpZR7+4fPKablCYBD8M9fhx/nfwUdXfBM/XfofKLGNAWCxtRdVFmvO5JIYD4bxm9diMbt5dht+uGlt9G+tFi3NkEukAwktYTqdr/ciHBHAQ8DNJQfgufBf4f16AA67gl80NIbAzlsQGdwHAMjnJ7G1sgeHPt+N/fdfi4Gfb8bhhzZizwOfxTduulizbxUA/ved/ri/G9Yvw6IyNgNvqvnPntt/AmPBEMaC5J8l0oOEltBNqvAuJV569zDurnoG7665F09f/DC+vPAj5K+4XXHdiVebEDm7N26ZY809qLztCayqiRUJX7ukHP/yl1fjSNsm3LZ2saZ29J4ZifvbznPYVLsUAFBepGzRjgQmseGRF/F3O7wodNp1W9IEAZDQEmmgJ5EgHJrE9nI3frB4B5blsQEt2/IvArbkmrShj55E6PDjScsda+9R3X5lcT6e/taNeHDj2inb4p8I4eTQWNyyGy6uBAAUqljGUhLEk1427bjkOlhd+Gfcs2AnulY8stS0E03MGCiOltBNng6LlvO9i0LEW5K2BTcorju55wfJv3e4wBVUTrmfB25bjVcOnVbNOJNI9LGuX84iHtQsVSkcLTA+jHAkgn9e3olPl+zDAqcPAHAqWFpo6MklZiRk0RK6cdq0XzYR38GkZfycZcnrDbwV9cvG76xUebvnDyct+/lX1k/ZnsTZHaQJJtVmhhDGTuF/L34YH33yh7AhAvf8P0ZFliC0QkJL6EaPj1YYO5W8kE/2h4b6/6CrDZzCNi5fVBYd3FLiyqXlioNeNp5TtWiXOAdwU8kBOBBSPhaC0AAJLaEbp45KV0JwSGEDySFgkY+9ir/nCiqUlytYxQCw4oJi1bbUq8Ts3lHxGubnqaTkTsTaL0SCIIh0IKEldKO1disAIJRc0FsYT56WRtVatGmfKRdgRW3UaPxkTfJ+R0/ikSW/Qn5+keJvBHn7Q2MgiHQgoSV0UW7345sLX1L+MpxsFXL5yem1wjmFbK9Jv9IWwTm0Z2+NBUM4cFzZf/rV1flYWVWStDzysVgHwaYyM694TFxRlWobCWIqSGgJTXAQ8FfzX8M7q5txU+lhxXXCA39K/l1hVdKyyMhRhR0o+325vFLNbdy+62hc0ZfleWfw3aqdeP2y7+PxLylvJ3T06ZTbFALM+uYccxDxa5utgSASofAuYkpW5J/Cv1b/Gte4xMIs9gLF9SJnveCKqsCXrIguU/Kxhvu7gatb45ZxxdWA7/3kjdqU95XI+KgP9z2xF8vzzmBT+dv4YvlurC06yjaxqB62xbck/UaYHEHoyHbFh0EiSpY5QWiFhJZQxc6F8Z2qZ9Gy8H+Qx8nST3mVdNVIGOH+F+KElr/guuTVBvchcv5w3Hq2yk8gfGxn0rqaBC48gaHnbseTiw9HxTW2ARucVz+k+LPQe48xH3IqoZV8tA6XuSebmNGQ64BQ5NKC43j50h/g+4v+O15kAXA29ZjT8LFn4tfNKwVfeknCimEEX7srbpGtelOS+4CvvAb2i76WuqGRECZe/msUn30hWWQBOK5oBj+/VvF3k+89ytqYQsyFwCBbxzEHmBg096QTMxayaIkkvlu1s/r+RU/ByakUUVEpyCpM+BA+/gKE4T7mChCxLbkVkaEP4tYNH+/G5DsPw7H2XgAAX3oJnJ/8OSJn3wFXVAX7kg3gKz+RuqGhcQR6voKwip/VtvjTcF71I8XvJg/+CsLIMfF4UsQFSyFd9gIIESoqQ6QHCS2RRJVzqFhVZAEIYeV4UiF4HhAimHz3Z3Be9y/R5Y7V38Hk/l8CQnzoVfBPfweEx+GofYCtt+ouaEUYOYpA92ZEzuxW/J4rrkZe3e+UfxsYxOSu+6J/8y71ojTRUDTOFhNdgtAJuQ4I/QgqIiz6M0OHPNFXbgDgXItVXQDB3d9H8M27dYvYxBvfVhfZwirkf/Y5cHllyvt88272UJDISzFXmTgYxznmKMYEE4QWSGgJw+DEjC9h0o/JPd+P+85Re7/qK/rku49gfMdqhP/8nOZ9RV/7E9swZykKvvhm3ECbHKUKYWrZZwBiCRM2J4TJERBEOpDQEvoJBaZcZfK9xxA583b0b75kheroPwBEhg4h8OwGjP1XDSZevROh9x9DqLcLglLMLZDkhgAAvmI9CjbtUk3PjZw/jOBLjcm/U1kfACLy2GBKWCDShISW0E9kUnGxIE9RFcII/OFLiAzHprBxrL0XjtXfSblpYbgPofe3YeLVJkx0b0booyeVV0woKmO/xI2C2/6oWlJRCAwisPMWCApimcqijUYdzFmmmDpMEFogoSV0I4RGFZdz9vjKWcLocQR+f3NcSUPntT+D85qfpB7pj9uoSsaYGJLFOUuQd+O/I+9TvwHsypW7hPEBBH5/s7q7QS28KxKr2MXZXfEPEoLQAQktoZ/w1K4DCWHkGAL/c31cdS7H2nuR/+knwKUahBLhVOrRIjwBe00DCjbvh/3iRtXfR3wHEXhmg3KtW2kfKgkLcRasoxDCKJVJJNKDhJbQjaDio1V7BRfGz2D86esROhILt7It+wIKvnIYjiv/PjmhQY6KlZr36SeRV78DXIrQrMjguwg8e2vSHGRx8E5Vn67gj1nAvGspuQ6ItCGhJfQzOay8PJU7IDSOiZ6vYuLVO6PlBrn8uXBe9SMU3H4QBZt2MdGtvAacPN2VT+06UCPc/wLGn7pW1V0Q3XzpCtXvIvLSjfZCCJQZRqQJJSwQuhGCKkKroR5A6P1tiJx4Cc5P/gK2JbdGl/MVV8FZcVVsH+MDQDiYOvRKcQdjCL79PcUECSW4okXqX8pigSGEKI6WSBsSWkI38mQEOXzpSk2/j5z/EIFnN8C2qB7O9Q8qptpqmZAxfqMhhD78LYJvfw/CqPZyhiktWjG0jMsrByJTizZBqEFCS+gnNAZh5GiSbzOVv1SJ8PFujB/vBj93DRyXfxv2C/9C1Sebqi2hI9sR3PsjCMN9ug+FL1N/OEgTS3JzliGiVKycIDRCQkukRai3K1oQRoIvX5XWtiKD+zDxxzsw8eqdsC28CbaFN4EvXwW+4ipVX2y4/wWEDnUifGynYmysVriSi1S/k/y7XEGFLiuZIBIhoSXSInT48SSh5fLngiuuTsuyBABEggj3P49w//Nse8XVKPxqr+KqwV33pY4m0Ag/d63qd4IY/8uXrqAZcIlpQVEHRFpEzh1QzNqyL/tCRvYvDPdOext86SWqFrMwMRS1lLmiRVE3AkGkAwktkTbBN+9OGhizX3ZnUnps2qiVY/T3x1ffShN+wQ2q3wmybDa+bKV6zQWC0AC5Doi0EUaOYaJ7M0scEC1DvmQFChreQfjYToRPv47I4L4pY1nZDx3g8uexWFwhDCE4pG5tBodUN8MVVrHBuuB55spwLQXnWgS+uAacKxbKxTlLYVt4k+p2wgNvxdYtrkFEyzEQhAoktFbH7REM3mI9Oht7jNpY+MRLCDx7K/Jv/X00JIsvWwm+bCUcYD5cYXIECAzG+zltBUxI80p1TSkOQLWKlm3Zbci/5QmAn/5lHXUV8E5w+eXkozUbi1/n04WElpg2kTO7Mb79UjjWPwjHpXcmCR3nmAM45qimuuren5roBYzL3JLKI3IFFcwi15D8QBBqkI+WMARh4hyCr38T40+sY3N4mTm/lkrNgfDpNxB882+nfyzjA9G4Wb58lSHRDcTsxnyL1u2pBlALoFr2AYA6Db/uEz9Kf7NyUBZ6PSBYTGzg+Y3gCipYTOyievALbgBfXGPcPvz9qt9NHngUwsQQ8m7897RdCOHTb0QtWH7+ldaKOHB76sDunS50NnqnuzkiMxgvtG5PLdiFIP1bNo2tyYVZbX8AE19v3Kez0WfGCSO0IYyfQejIdoSObAcAcM5icCUXgSusAle0AJyjGOAdsfUnBoFIGELgLKtzIBYX5/LnskEyh4tNc55XhtChx1PuO/ThbyH4++G8/tGUSRTC+AAwOQpwPIQJH2AvAFdYhfDh30bXsc1fj+D//Th7J9LtKQPQAHY/NSB2P5GBkUMYI7TMam0AsAVTCaM5SILcIGuTpZzhsx0hOAzh48wZYOFTr2J8x2pwBRVs0I3jWSHvyREgNM6Kl4cnptgKh9CxnYic2ZPZkxW7nyRxJXKc6Qkte43ZAroYCEsiQBgfYJZrmr8PffDrzDQ19iYoCSwxg0hPaJnANkObn5UgCCXcHrnVmo03QSJD6BNa5i9qBbNiCYLQQ8zfKg1oTWf8gsghtAsts2J3gC4OgtCP29MNegOctWiLo3V7mgF0g0SWINKFRHYWM7VF6/ZsA7kKZhVjEeeep85d9Uq225ELRMCdAXZluxmExUkttCSys5IHfvDM6wA+le12EMRMQd11QCJLEARhCMpCy3yyJLIEQRAGkCy0LLqgNdsNIwiCmCnECy2L89uW7UYRBEHMJBIHw7JRq8AHViBDKgjjU6xKxB4CUmqiVA2sFpSuSBCExYkJLStk0ZzBfXcA6EFnY5emtVk1LqlITKxYDBNgKdNGXt1IH+z4JfEGkuMeleIgE8s4AtLDQvqOStllBuo/Y2Cuw8RzmKqKXl/Cx0vFnJLhov9ze1qRGaHtAbAVnY1pzkk9BW7PFvE4tqbs8NgFJf1rZjKGZLH36L4IjZ/iwyg60Nm4VeMxnINx59eLzsZ1lus/1p5uE9uQDi3obGxLuQYrZiOlBRv1dugD0AU9hlQ2p7JhNSd2GLx/iQ50Nm61izsqg/lRBj6wju8wdS9s+x3iMcXDrJ5tyHyWjmRxN8Pt8YFZ8x2mPWwyg7abkp1zI0XQl4WHz8zqP/PLmkp6sgVuTx+ANtPv++mdC7PGpbySMSINhqX/yq0NH9gTJnMnW7nwdzWynwpZBmZx98Lt2SZ2dC6i1fox2odO/Zcubk+Z+ObaCxZZlIm2MyFze7pF69lqbIM52sc0T0QSWrMv3s2zzteljS0A9ojujtyDvS5PhZE3s9UsyNzpP/Z63IvMjsPIYa4VK50rli9glvbVy409uUVrFi3kHE8JC6ljmXi5hhYLJdsWqNlIIZHW7T92bVmh8p50rWdfbJl1bVa+QEuiYclrtErSpW9KZzwhsSUHxVaLtWrk62JLtg84BdZ0Ibg9O2C9LM/sii0bvzFz8CtJ83iYG4dKIquPLZZ42msn9bVj7ECYT/wQ2mmFdaeZ2pZFn61Z/mkvVIwB3qQdArEQD0IfrYoRE8ZhpFhNdaMYeSPRtTTzyPwbHPNVm2HM+MDGohTvLzOFtoum/E4LabogszC2T1K7noy8tmgwNfv0yD5GXEe14oBUZjA3lCtlboAd5jnIrTZCrAcpO8iH5BtcniVjln+7AYC2ZAD9tMHYi60W8ky9eIw8P13QbiFnu/9mGh1gAzzx4spEcrpGQTMy52I0K5SrZarEDDvM89HmigXSB3mtBb1haLHMmi0wrhPL4PZsMSnu2Oi3jOo0v9MDeztye5S+s2L/zSTUs8s6G9vEPpmO2JZlZFzCvFCuHi0D/ulNN64NKwutF7EUwem1k/3eC7enDSwF06gHl1kPQMl3btQgiXI7mZ/ZKKH1Kvxt9f6bCUwdNcTEVpo2PV3MFVrzQrn6AGzWsqJ5Qjtd/6xxvht5kYs+AOtMSZ5gFlc9WFC4EZaRmeFCXpgttOYMhOVS//WgszGaGZSxXH5j60pofaXX49ZRwryHm3mhXCkHvxIx06KdLkY9gVog+RDNzk1nN2sHjMm+MdOy6oKRT3i3p07hpjeq/d5ov1H/pYYNTBrp/tCaaGTlt1ezQrla9DzwrSy0mSdW81aqBiWvf6t0AcvL7En/N+oGM89f2NnYB7fHa2BblQbEjNq29rCu2dJ/6hgr7lofbJ2NPSr+8+xiXihXh97xEzvYDTJ7R19ZyMcWpFcmLlWdTqvTk8bxqqEkKkZtO7VVNXv7TwnyL8eohjl+Wa/m8qAyzLNo3Z5aSxeSYa9ZZhaVsDpdMK7ASPwNbtxAmHrhbeo/JYy1ot0eq9XX1UMrjH+riKvIpQc7mH/FjIvVmqEy2atJay06G71irVAjBDHxXJrnNqD+S4XR1nkun2Mz9Efz4FciPMzLH7feawzz2exBbl9ARmJcVbX4vHVz3AbUf1Mxk9wgVkMp+UUz/HR+PAXWEloWFG2FUnFWwsjylUYLrS8ukoH6j8gu05ohnDexVmyDycVRtMOsrVwrQWg+Wudz0obcmjJCaGNto/4jrEGD+FalG6nwt3liaw3Mqj05EzBKbJm4GjcQ1iPbHvWfNnK5vojRmDVt1rZ0DEgp6sCsEK9mEw9YD0b7rrrAXC59SPZxmxW7ZxY9MOaBKF0/xriMYta2GRMIzqT+k2PU4OZMoAvmzBEozRmnqwi9JLQdMCfmrBpuT3OWZ1kw8rhawIKV1QcQrTkBXSq6YNRrOTt2Y90GxoreTOw/OVSWNJ42mGVAuj09etyuzHXALjyzLM/WHL94Jbais7FtxtXYZcdj1ICoUUIruQ1qYZyFNtP6T+n11bpx69mACaElXAjyhIUumPfK1A23Z3MOT9Lo1ZFyl4uvbtMtCiI/diMtWqOskZnYf7VI9q8b7aOtMb2+hITxRXck2sDcQUYPzEsZiZre1vno/5gImiWEZWBi22yZSAR96BkwysUYT6P6vQHTFyqvzOo06lzOxP7bonAvGX3/5v6bKHtQmOW61Py2zif8bbYvtRVAL9yebXB7GsQsn3jcnup0QyiyDksLzRWLKAZLczXCcjHi2OWimNmHcm71n2S8xM6RsW4gIHcHBRPpgHkRGZrGN+KFllm1ZottGVgH7gATXSHuw+qBWi2cR+vNl7n5j4zHKpMfytthlEVlhf4z40avRcxwaRZrOBvZj3Wmz36QiTdc9gAyS9c0zXvGKyxrA8XjJTJ18oXbk+v591bwn3tN8glaof/Muqckw6VV9jGSbYZPoOj2sOlrWNGazFjNzEdv1jXerPh2LiO5ehcrfrwZLKecYEivaZuThICd4FZYJzkjPVhNUR+ym+Jq9hhBNvsvl42XVtGy7QKbv03vvGzyOsHSHG0SmXzAt8AcXZPSc1UreymXSWSVnbaC0h7lSK9p0gyrQHxx6ZmAmZEnWvcvx+ji5Nnsv1wWWoC5X5rBrDcgJpDy8ylfV7Lw1IquZx6max0w5xqvS5UzoF6PtrOxQ3wSmZHIkMvMJGFNJJtxmEq1Z42c8UAiW/1nBdeMkdQl/JsrtMCccC+APYQUE2L4lD9j6qy7mjiRs2RzQKxH47LcxLjIDmI6mDswplrhi5/yp8yJvBWU3qeV3D1P7CLMltgqiWoXMn8+zdxfput+tICyxZJhBqRZDz3FCl9TCy1rWAeYozcXO01X8YdpIhUryWWy0X6fYslGc60PJczuvw5k/sGRq/et2ZipC0npudqEFpBefepNbqBZZOJC68PMcLNkw6JNtc8OzJT+y/yDQ9pnPawTJ20N2IPdzCiXuJA47ULLGucTze4aExtpBma7PnyYxnxCloKFP2XaAlLfHzunM6f/2P2TWRcCu283gxlJuX+NGoeZRmOzmGkIQK/QSnQ29qGzsR7sSWmFerNTtVeyxs0QEC+AdZae8Vc/mX6Ipra2Zlr/semqM3/fxIwk69+zmYD1uZnnIupCSE9oYw3tES+aGrCng1VGVXvE9qyLxrWZ4/poAVCfsQpHmSOTr5ldmizJmdZ/7L7JvIXJrFvpns2Gz1iOFSIxzOwDKfYYnOGbZtVs6pCcAWIWXsQ6zKupFCPLBtoifvTG00kj822KNyhLKzQmtrCzkTOhfFy9xnPUi8wUWGnRXRg+l/rP3GNJxCv79Gh+gLBRcvl9awZSwZvYR96+bF3nbN/NMDdfYJ3xQpt8EFLxZvkHmPpiTsw4kf72gYlqnyGWSPyDoQzJmSx94qdH3CcNKliJmdR/zKcnpamWQfkekY5HXqlLm4GhrQ3ydFkktEF+/ya2R47UFule9c6I8QuCIAiCIAiCIAiCIAiCIAiCIAiCIAiCIAhr4m9Hs78dgr8dZk0JnHNI58PfntPzhBEEkQHiCn/721EGlmTgczVREQqCIAgjSJxh4Zz4by5W6CIIgrAk06t1QBAEQUyJHQD87UjM7271t6MVQI+rKX5mR387pFlD68BS7DpcTck1NkXfZZ34kUrvdbiaYpWhZD7ferCUv2YAXlcT6sXftyJWIGabuI4XrKZnD1h+eIN8eaLLQ2yv1JZqxHKt21xNsdRBhf1Jv4G4rM3VNHX1KAP2VwYxFz9xf/52NIjHXCduUypU3Q0ArqZY7QrRDZR4frrEPvDJ1pP6oEXej7L2Rber0GbpOqh3NaEnoc+l89blaqJqUcTsRrJoWRGKGFJuuJKw7AG7cX1gQtKaOCAkCrd0E0rbaADQLYpFIg3i+kpFNaohCom4z1oAO8RPM2L1EGoB7BCFTmpHndheqWBHj7i9LQD2iN+r7U9qu+S37pZvWwmD9ic/V2WybTeLxyw94HziOVMrhiH1Qa2sHa2yczldpLZI7ZPaIj1Ye2ClGVAJIovwAOBqQkuC5drhakK9q0nRV9vjakKNqwk1iAlDdPpef3vU4gKAda4mrBPXlawaJWHYgpiVlFigohrMulsHYLNseS2YJSXVxZWQi9k2sBvdC6BGXFdqt9pEatViG6T114nLk6qmK5Du/uTrt8j21yCeU/m+exLallRtSewD6WG4TtYOH4Ba8fvpIFne8iLW0jY7xOuj3tWEclDtU4JIy0crdxNIr+lyS0+yWDsSXn0lAan2tyeJQ594Y7a5mhSnE+kBALnbAUzwvQrLy4Doa7bUrq3S67L4r7SPahULu022vvTKDaSoODbN/bXIXuflwiRZg3Wy/7eotE2OtI8u2TnyybZtRBnAFvEBvTXh/NfKLXe5m4IgZit2vT/Q4KeMzvcuuhCUkHyGEilDyVT2OVU7qtV+72qC19+evJ7s+8T2eIE4ITV6f17Z/32ydafctqxtctT6QNqOETVHE89RG2Kuim5/O3xgD6zMzpFFEBZEt9DqQKl2pUSi346sHnNQ64NpF/ROtFRdTWjzt0dFvwGsj1v97ShTcUERxKzBDKH1glk1bVm+weQj/A1yKzXh9T2peHji+ohZgKms6LT3pwF5lEBd4qu6wvrp9EHiw0+31Su2q8ffHo0SaQDzLZPQErMaNR/tdF4tJYHZkjjK7m9HdaZSVkWhkwSqWRrBTxhYUsuAk68vn5LHa9L+pkIurGptk5OqD7Yk+Mgl4W+QbbcBOqchSuGXpbcVYtaTKLTSYEmDvx17/O3YoXeDok+uB8xC6va3o9ffzv4F0Auj5mPSxmbEQsJ6RX9lL2Ij8ptVflctW3+PuMwHTOlvTHd/U53TPtm+68Rt7xHbpiRkHYhFOnSLfdktxsxKkRHydaVj3iNudwf0zzjb7G/HOXE/5xATavLRErOeRKFtQWxmzLStWjGcaCtigiuJaxcyGO4jvsquE/fZh1iMZwdY2JPaPEv1YtulmNUusFCyPpP2p+VYWsD6RxJQKZqhTWFdnxgO14JYPGud+P82IG7wrQ2xsLpq2Xb1vu5LSSnyZIWtNBhGEESUXK1QJlmqoiVKEIQFoVoHOYK/PT4+VVwmTw6hamsEYVHMDO8ijKUOLFxKmmZaHrrlBWVgEYRlIaHNHaQsMMnn7QPzg/YgoVAMQRDW4v8BFEnKZo355nIAAAAASUVORK5CYII=" width="346" height="148"/>
                    </svg>
                </a>
                <div class="tagline">
                    <h1 class="title-big">{{ trans('content.home.h1') }}</h1>
                    <p class="sub-title-big">{!! trans('content.home.h1_under') !!}</p>
                </div>
                <section class="tab">
                	<?php /*
                 	<!-- Slider statique -->
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home_slide_1" aria-controls="home_slide_1" role="tab" data-toggle="tab"></a></li>
                        <li role="presentation"><a href="#home_slide_2" aria-controls="home_slide_2" role="tab" data-toggle="tab"></a></li>
                        <li role="presentation"><a href="#home_slide_3" aria-controls="home_slide_3" role="tab" data-toggle="tab"></a></li>
                        <li role="presentation"><a href="#home_slide_4" aria-controls="home_slide_4" role="tab" data-toggle="tab"></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="home_slide_1">
                            <h2>Control-Therm</h2>
                            <p class="sub-title title-underlined">thermoplongeur tout-en-un avec régulation intégrée</p>
                            <p class="text">Développé spécialement pour les petites cuves nécessitant du chauffage dans un encombrement minimum</p>
                            <button class="btn btn-primary">{{ trans('content.global.ensavoirplus') }}</button>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="home_slide_2"><h2>Control-Therm</h2>
                            <p class="sub-title title-underlined">thermoplongeur tout-en-un avec régulation intégrée</p>
                            <p class="text">Développé spécialement pour les petites cuves nécessitant du chauffage dans un encombrement minimum</p>
                            <p class="text">Développé spécialement pour les petites cuves nécessitant du chauffage dans un encombrement minimum</p>
                            <p class="text">Développé spécialement pour les petites cuves nécessitant du chauffage dans un encombrement minimum</p>
                            <button class="btn btn-primary">{{ trans('content.global.ensavoirplus') }}</button></div>
                        <div role="tabpanel" class="tab-pane fade" id="home_slide_3">
                            <h2>Control-Therm</h2>
                            <p class="sub-title title-underlined">thermoplongeur tout-en-un avec régulation intégrée</p>
                            <p class="text">Développé spécialement pour les petites cuves nécessitant du chauffage dans un encombrement minimum</p>
                            <button class="btn btn-primary">{{ trans('content.global.ensavoirplus') }}</button>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="home_slide_4">
                            <h2>Control-Therm</h2>
                            <p class="sub-title title-underlined">thermoplongeur tout-en-un avec régulation intégrée</p>
                            <p class="text">Développé spécialement pour les petites cuves nécessitant du chauffage dans un encombrement minimum</p>
                            <button class="btn btn-primary">{{ trans('content.global.ensavoirplus') }}</button>
                        </div>
                    </div>
                    */ ?>
                    
                    <!-- Slider dynamique -->
                    <?php 
                    if(count(NEWS::getRange(5)) > 0){
						
						$total = count(NEWS::getRange(5));
						
						echo '<!-- Nav tabs -->';
	                    echo '<ul class="nav nav-tabs" role="tablist">';
	                    	
	                    	$cp=0;
							foreach (NEWS::getRange(5) as $new) { 
	                        
	                        	echo '<li role="presentation" class="'.($cp==0 ? 'active' : '').'"><a href="#home_slide_'.$cp.'" aria-controls="home_slide_'.$cp.'" role="tab" data-toggle="tab"></a></li>';
	                        	
		                        $cp++;
							}
	                        	
	                    echo '</ul>';
						
						echo '<!-- Tab panes -->';
                    	echo  '<div class="tab-content">';
						
                    	$cp=0;
						foreach (NEWS::getRange(5) as $new) {  
                    		
                    		echo '<div role="tabpanel" class="tab-pane fade '.($cp==0 ? 'active in' : '').'" id="home_slide_'.($cp).'">';
	                            echo '<h2>'.$new->title.'</h2>';
	                            echo '<p class="sub-title title-underlined">'.$new->subtitle.'</p>';
	                            echo $new->content;
	                            echo NEWS::pdf($new,'<i class="icon-download pull-right" style="margin:0 0 20px 0;font-size:30px;color:#F49700;font-weight:bold;"></i>', array('attachment'));
	                            echo '<button class="btn btn-primary" onClick="javascript:window.location.href=\''.$new->learn_more_url.'\';">'.trans('content.global.ensavoirplus').'</button>';
	                        echo '</div>';
						
							$cp++;
						}
						
						echo '</div>';
                    }		
                    ?>
                </section>
            </div>
        </div>
    </div>
</header>